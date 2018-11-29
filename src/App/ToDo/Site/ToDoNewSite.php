<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\ToDo\Com\ToDoNavigation;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;


class ToDoNewSite extends AbstractSite
{

    /**
     * @var ToDoItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'new';
        $this->title = 'New';
        $this->menuActive = false;



    }


    protected function registerSite()
    {
        ToDoNewSite::$site = $this;
    }

    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();



        new ToDoNavigation($page);


        (new ToDoProcess())->getProcessView($page);


        $page->render();

    }

}