<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\Parameter\DataIdParameter;

class ToDoItemSite extends AbstractSite
{

    /**
     * @var ToDoItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'to-do-item';
        $this->menuActive = false;

        new ToDoDoneSite($this);

    }


    protected function registerSite()
    {
        ToDoItemSite::$site = $this;
    }

    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $dataId = (new DataIdParameter())->getValue();

        $todoRow = (new ToDoReader())->getRowById($dataId);

        $title = new AdminTitle($page);
        $title->content = $todoRow->todo;


        $page->render();

    }

}