<?php

namespace Nemundo\Workflow\Delete;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeDelete;

class WorkflowDelete extends AbstractBase
{

    /**
     * @var string
     */
    public $workflowId;


    public function deleteWorkflow() {


        $delete = new WorkflowStatusChangeDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->workflowId);
        $delete->delete();

        (new \Nemundo\Workflow\Data\Workflow\WorkflowDelete())->deleteById($this->workflowId);

    }


}