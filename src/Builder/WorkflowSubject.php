<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;

class WorkflowSubject
{

    /**
     * @var string
     */
    private $workflowId;


    public function __construct($workflowId)
    {
        $this->workflowId = $workflowId;
    }


    public function changeSubject($subject)
    {

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);

    }

}