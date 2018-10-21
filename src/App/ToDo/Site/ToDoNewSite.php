<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
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

    }


    protected function registerSite()
    {
        ToDoNewSite::$site = $this;
    }

    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new ToDoNavigation($page);


        (new ToDoProcess())->getView($page);





        $page->render();

    }

}