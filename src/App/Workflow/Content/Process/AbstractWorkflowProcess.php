<?php

namespace Nemundo\Workflow\App\Workflow\Content\Process;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Workflow\Model\AbstractWorkflowModel;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Row\AbstractModelDataRow;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\View\AbstractProcessView;
use Nemundo\Workflow\App\Workflow\Content\View\ProcessView;
use Schleuniger\Com\Error\ErrorMessage;


abstract class AbstractWorkflowProcess extends AbstractWorkflowStatus
{

    /**
     * @var string
     */
    protected $baseModelClass;

    /**
     * @var string
     */
    protected $processViewClass;

    /**
     * @var AbstractModelDataRow
     */
    private $baseRow;


    public function __construct($dataId = null)
    {
        $this->viewClass = ProcessView::class;
        $this->processViewClass = ProcessView::class;
        parent::__construct($dataId);
    }


    private function loadBaseRow()
    {

        if ($this->baseRow == null) {

            /** @var AbstractWorkflowModel $model */
            $model = $this->getBaseModel();

            $reader = new ModelDataReader();
            $reader->model = $model;
            $reader->addFieldByModel($model);
            $reader->checkExternal($model);
            $this->baseRow = $reader->getRowById($this->dataId);

        }

    }

// getCurrentStatus
    public function getStatus()
    {

        $contentType = null;

        if ($this->dataId !== null) {

            $model = $this->getBaseModel();
            $this->loadBaseRow();

            $statusId = $this->baseRow->getModelValue($model->statusId);
            if ($statusId !== '') {

                $className = $this->baseRow->getModelValue($model->status->contentTypeClass);
                $statusDataId = $this->baseRow->getModelValue($model->statusDataId);

                /** @var AbstractWorkflowStatus $contentType */
                $contentType = new $className($statusDataId);
                $contentType->parentContentType = $this;

            }

        } else {

            /** @var AbstractWorkflowStatus $status */
            $contentType = new $this->nextContentTypeClass();
            $contentType->parentContentType = $this;

        }

        return $contentType;

    }


    public function getNextContentTypeList()
    {

        $list = $this->getStatus()->getNextContentTypeList();
        return $list;
    }


    public function getForm($parentItem = null)
    {

        $status = $this->getStatus();
        $form = $status->getForm($parentItem);
        return $form;

    }


    public function hasProcessView()
    {

        $value = false;
        if ($this->processViewClass !== null) {
            $value = true;
        }

        return $value;

    }


    public function getProcessView($parentItem = null)
    {

        //$view = null;
        //if (class_exists($this->processViewClass)) {


        try {

            /** @var AbstractProcessView $view */
            $view = new $this->processViewClass($parentItem);
            $view->contentType = $this;
            $view->dataId = $this->dataId;

        } catch (\Exception $exception) {
            new ErrorMessage($parentItem);
        }


        /*} else {
            (new LogMessage())->writeError('Process View Class does not exist. Class Name: ' . $this->processViewClass);
        }*/

        return $view;

    }


    /**
     * @param AbstractTreeContentType|AbstractWorkflowStatus $contentType
     */
    protected function changeStatus(AbstractTreeContentType $contentType)
    {

        $model = $this->getBaseModel();

        if ($contentType->changeStatus) {
            $update = new ModelUpdate();
            $update->model = $model;
            $update->typeValueList->setModelValue($model->statusId, $contentType->contentId);

            $dataId = $contentType->dataId;

            if ($dataId == null) {
                $dataId = '';
            }

            $update->typeValueList->setModelValue($model->statusDataId, $dataId);
            $update->updateById($this->dataId);
        }

        if ($contentType->closingWorkflow) {

            $this->closeWorkflow();

            (new WorkflowBuilder($this))
                ->closeWorkflow();

        }

    }


    public function closeWorkflow()
    {

        $model = $this->getBaseModel();

        $update = new ModelUpdate();
        $update->model = $model;
        $update->typeValueList->setModelValue($model->closed, true);
        $update->updateById($this->dataId);

    }


    public function reopenWorkflow()
    {

        $model = $this->getBaseModel();

        $update = new ModelUpdate();
        $update->model = $model;
        $update->typeValueList->setModelValue($model->closed, false);
        $update->updateById($this->dataId);

    }


    protected function getBaseModel()
    {

        if (!$this->checkProperty('baseModelClass')) {
            return null;
        }

        /** @var AbstractWorkflowModel $model */
        $model = (new ModelFactory())->getModelByClassName($this->baseModelClass);

        return $model;

    }

    public function isWorkflowOpen()
    {

        $value = true;

        if ($this->dataId !== null) {
            $model = $this->getBaseModel();
            if ($this->baseRow->getModelValue($model->closed)) {
                $value = false;
            }
        }

        return $value;

    }


    public function isWorkflowClosed()
    {

        $closed = false;
        if ($this->dataId !== null) {
            $model = $this->getBaseModel();
            $closed = $this->baseRow->getModelValue($model->closed);
        }

        return $closed;

    }


    public function onChildAddEvent(AbstractTreeContentType $contentType)
    {

        $this->changeStatus($contentType);

    }

}