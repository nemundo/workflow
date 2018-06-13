<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Search\SearchIndexBuilder;


class SubjectWorkflowAction extends AbstractWorkflowAction
{

    // subject/deadline


    public function changeSubject($subject)
    {

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->changeEvent->workflowId);

        $searchIndex = new SearchIndexBuilder($this->changeEvent);
        //$searchIndex->process = $this->process;
         $searchIndex->addText($subject);

    }

}