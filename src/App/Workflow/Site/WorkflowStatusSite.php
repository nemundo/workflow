<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Web\Site\Site;

class WorkflowStatusSite extends Site
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    public function isActiveWorkflowStatus() {

        $value= false;
        if ($this->workflowStatus->contentId == (new ContentTypeParameter())->getValue()) {
            $value=true;
        }
        return $value;

    }

}