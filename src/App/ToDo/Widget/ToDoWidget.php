<?php

namespace Nemundo\Workflow\App\ToDo\Widget;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Com\Html\Basic\Strike;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\ToDo\Action\ToDoAction;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoForm;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoTable;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\ToDo\Site\ToDoDoneSite;

class ToDoWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'To Do';
        $this->widgetId = '';
    }


    public function getHtml()
    {

        $form = new ToDoForm($this);
        $form->model->action->addInsertAction(new ToDoAction());


        $table = new AdminTable($this);

        $toDoReader = new ToDoReader();
        $toDoReader->filter->andEqual($toDoReader->model->userId, (new UserInformation())->getUserId());
        $toDoReader->addOrder($toDoReader->model->done);
        $toDoReader->addOrder($toDoReader->model->todo);


        foreach ($toDoReader->getData() as $toDoRow) {

            $row = new TableRow($table);

            if ($toDoRow->done) {
                $strike = new Strike($row);
                $strike->content = $toDoRow->todo;

                $row->addEmpty();

            } else {
                $row->addText($toDoRow->todo);
                $link = new Hyperlink($row);
                $link->content = 'Done';

                $site = clone(ToDoDoneSite::$site);
                $site->addParameter(new ToDoParameter($toDoRow->id));
                $link->site = $site;

            }





        }


        //$table = new ToDoTable($this);
        //$table->filter->andEqual($table->model->userId, (new UserInformation())->getUserId());

        return parent::getHtml();

    }

}