<?php

namespace Nemundo\Workflow\Delete;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Delete\ModelDelete;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeDelete;
use Nemundo\Workflow\Factory\WorkflowDataId;

class WorkflowDelete extends AbstractBase
{

    /**
     * @var string
     */
    public $workflowId;


    public function deleteWorkflow() {


        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);
        $process = $workflowRow->process->getProcessClassObject();

        $dataId = (new WorkflowDataId())->getDataId($this->workflowId);

        $model = (new ModelFactory())->getModelByClassName($process->baseModelClassName);

        $delete = new ModelDelete();
        $delete->model = $model;
        $delete->deleteById($dataId);

        $delete = new WorkflowStatusChangeDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->workflowId);
        $delete->delete();

        (new \Nemundo\Workflow\Data\Workflow\WorkflowDelete())->deleteById($this->workflowId);

    }


}