<?php

namespace Nemundo\Workflow\App\ToDo\Com;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;
use Nemundo\Workflow\App\ToDo\Site\ToDoSite;

class ToDoNavigation extends BootstrapSiteTabs
{

    public function getHtml()
    {

        $this->site = ToDoSite::$site;

        return parent::getHtml();
    }

}