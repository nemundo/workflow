<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Search\SearchIndexBuilder;


class WorkflowSubject extends AbstractWorkflowAction
{


    public function changeSubject($subject)
    {

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);

        $searchIndex = new SearchIndexBuilder();
        //$searchIndex->process = $this->process;
        $searchIndex->workflowId = $this->workflowId;
        $searchIndex->addText($subject);


        //$this->addSearch($subject);


    }

}