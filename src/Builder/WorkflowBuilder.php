<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Data\Workflow\Workflow;
use Nemundo\Workflow\Data\Workflow\WorkflowValue;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Search\SearchIndexBuilder;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowBuilder extends AbstractBase
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $dataId;


    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var string
     */
    public $workflowNumber;

    /**
     * @var string
     */
    public $subject;


    public function createItem()
    {


        if (!$this->checkObject('process', $this->process, AbstractProcess::class)) {
            return;
        }

        /*
        if (!$this->checkObject('workflowStatus', $this->workflowStatus, AbstractWorkflowStatus::class)) {
            return;
        }*/


        /*
        if (!$this->checkProperty(['dataId'])) {
            return;
        }*/


        /** @var AbstractWorkflowBaseModel $baseModel */
        $baseModel = (new ModelFactory())->getModelByClassName($this->process->baseModelClassName);

        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);


        if ($this->process->baseModelClassName == $workflowStatus->modelClassName) {
            $this->dataId = $this->workflowItemId;
        }


        if ($this->dataId == null) {

            $data = new ModelData();
            $data->model = $baseModel;
            $this->dataId = $data->save();

        }


        $data = new Workflow();
        $data->processId = $this->process->processId;

        $workflowNumber = null;
        if ($this->process->createWorkflowNumber) {
            $workflowNumber = $this->workflowNumber;
            $number = 0;

            if ($workflowNumber == null) {

                $value = new WorkflowValue();
                $value->field = $value->model->number;
                $value->filter->andEqual($value->model->processId, $this->process->processId);
                $number = $value->getMaxValue();

                if ($number == 0) {
                    $number = 1000;
                }

                $number++;

                $workflowNumber = $this->process->prefix . $number;


            }

            $data->number = $number;
            $data->workflowNumber = $workflowNumber;

        }

        $data->subject = $this->subject;
        $data->workflowStatusId = $workflowStatus->workflowStatusId;
        $data->dataId = $this->dataId;
        $workflowId = $data->save();


        $update = new ModelUpdate();
        $update->model = $baseModel;
        $update->typeValueList->setModelValue($baseModel->workflow, $workflowId);
        $update->updateById($this->dataId);

        //$workflowStatus->runWorkflow($workflowId, $this->workflowItemId);
        $action = new WorkflowStatusChangeBuilder();
        $action->workflowStatus = $workflowStatus;
        $action->workflowId = $workflowId;
        $action->workflowItemId = $this->workflowItemId;
        $action->changeStatus();


        if ($this->process->createWorkflowNumber) {
            $searchIndex = new SearchIndexBuilder();
            $searchIndex->process = $this->process;
            $searchIndex->workflowId = $workflowId;
            $searchIndex->addWord($workflowNumber);
        }

        return $workflowId;

    }

}