<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;


class AbortTemplateWorkflowStatus extends AbstractStatusChangeWorkflowStaus
{

    protected function loadType()
    {

        $this->contentLabel[LanguageCode::EN] = 'Abort';
        $this->contentLabel[LanguageCode::DE] = 'Abbruch';

        $this->contentId = '0e49408b-e3cd-4850-888f-65c53415c043';

        $this->contentName = 'worklow_abort';
        $this->subject = 'Workflow was chanceld';
        $this->closingWorkflow = true;

    }


    public function saveType()
    {

        $this->saveContentLog();

        if ($this->parentContentType !== null) {
            (new AssignmentBuilder($this->parentContentType))->archiveAssignment();
        }

    }

}