<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusSite extends Site
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    public function isActiveWorkflowStatus()
    {

        $value = false;
        if ($this->workflowStatus->contentId == (new ContentTypeParameter())->getValue()) {
            $value = true;
        }
        return $value;

    }

}