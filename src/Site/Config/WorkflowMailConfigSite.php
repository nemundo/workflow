<?php

namespace Nemundo\Workflow\Site\Config;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class WorkflowMailConfigSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Mail Config';
        $this->url = 'mail-config';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = 'Mail Config';


        $page->render();


    }


}