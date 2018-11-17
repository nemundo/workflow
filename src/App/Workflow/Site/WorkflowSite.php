<?php

namespace Nemundo\Workflow\App\Workflow\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class WorkflowSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Workflow';
        $this->url = 'workflow';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        // search





        $page->render();

    }
}