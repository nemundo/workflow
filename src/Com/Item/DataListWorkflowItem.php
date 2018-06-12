<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Com\View\WorkflowModelView;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\WorkflowStatus\AbstractDataListWorkflowStatus;

class DataListWorkflowItem extends AbstractWorkflowItem
{

    /**
     * @var string
     */
    public $workflowId;

    // kein item Id


    /**
     * @var string
     */
    public $statusChangeId;

    public function getHtml()
    {

        $reader = new WorkflowStatusChangeReader();
        $reader->model->loadWorkflowStatus();
        //$reader->filter->andEqual($reader->model->workflowItemId, $this->workflowItemId);

        //$statusChangeRow = $reader->getRow();
        $statusChangeRow = $reader->getRowById($this->statusChangeId);


        /** @var AbstractDataListWorkflowStatus $workflowStatus */
        $workflowStatus = $statusChangeRow->workflowStatus->getWorkflowStatusClassObject();

        //$p = new Paragraph($this);
        //$p->content = $workflowStatus->modelListClassName;

        /** @var AbstractWorkflowBaseModel $model */
        $model = (new ModelFactory())->getModelByClassName($workflowStatus->modelListClassName);
        $model->workflow->visible->table = false;


        $table = new BootstrapModelTable($this);
        $table->model = $model;
        $table->filter->andEqual($model->workflowId, $statusChangeRow->workflowId);

        //(new Debug())->write($statusChangeRow->workflowId);


        /*
        if ($workflowStatus->modelClassName !== null) {

            $model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClassName);

            $view = new WorkflowModelView($this);
            $view->model = $model;
            $view->dataId = $this->workflowItemId;

        }*/

        return parent::getHtml();

    }

}