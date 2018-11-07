<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\Redirect\FileFileRedirectSite;
use Nemundo\Workflow\App\WorkflowTemplate\Site\Delete\FileDeleteSite;

class WorkflowTemplateSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'WorkflowTemplate';
        $this->url = 'workflow-template';
        $this->menuActive = false;

        new FileFileRedirectSite($this);
        new FileDeleteSite($this);


    }

    public function loadContent()
    {
    }
}