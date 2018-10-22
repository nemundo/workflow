<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\ToDo\Com\ToDoNavigation;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoTable;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\Workflow\Controller\WorkflowController;

class ToDoSite extends AbstractSite
{

    /**
     * @var ToDoSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'To Do';
        $this->url = 'to-do';


        new ToDoNewSite($this);

        //new ToDoItemSite($this);
        //new ToDoDoneSite($this);

    }


    protected function registerSite()
    {
        ToDoSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new ToDoNavigation($page);

        //$nav = new AdminNavigation($page);
        //$nav->site = ToDoSite::$site;
        //new ToDoTable($page);

        $row = new BootstrapRow($page);

        $col1 = new BootstrapColumn($row);
        $col1->columnWidth = 4;

        $col2 = new BootstrapColumn($row);
        $col2->columnWidth = 8;


        $table = new AdminClickableTable($col1);


        $reader = new ToDoReader();
        $reader->model->loadUser();

        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->todo);
            $row->addText($toDoRow->user->displayName);

            $process = new ToDoProcess($toDoRow->id);
            $row->addClickableSite($process->getViewSite());

        }


        $toDoParameter = new ToDoParameter();
        if ($toDoParameter->exists()) {

            $process = new ToDoProcess($toDoParameter->getValue());
            $process->getProcessView($col2);

        }

        $page->render();

    }

}