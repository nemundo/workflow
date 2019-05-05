<?php

namespace Nemundo\Workflow\App\ToDo\Com;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;
use Nemundo\Workflow\App\ToDo\Site\ToDoSite;

class ToDoNavigation extends BootstrapSiteTabs
{

    public function getContent()
    {

        $this->site = ToDoSite::$site;

        return parent::getContent();
    }

}