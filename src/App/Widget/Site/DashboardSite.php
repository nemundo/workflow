<?php

namespace Nemundo\Workflow\App\Widget\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class DashboardSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Dashboard';
        $this->url = 'dashboard';


    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //new WidgetListBox($page);


        $page->render();


    }


}