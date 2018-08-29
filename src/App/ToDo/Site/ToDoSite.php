<?php

namespace Nemundo\Workflow\App\ToDo\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoTable;

class ToDoSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'To Do';
        $this->url = 'to-do';

        new ToDoItemSite($this);
        new ToDoDoneSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        //new ToDoTable($page);


        $table = new AdminClickableTable($page);


        $reader = new ToDoReader();
        $reader->model->loadUser();

        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->todo);
            $row->addText($toDoRow->user->displayName);


        }




        $page->render();


    }


}