<?php

namespace Nemundo\Workflow\App\ToDo\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\ToDo\Action\ToDoAction;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoForm;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoTable;

class ToDoWidget extends AbstractAdminWidget
{

    protected function loadCom()
    {
        parent::loadCom();

        $this->widgetTitle = 'To Do';

    }


    public function getHtml()
    {



        $form = new ToDoForm($this);
        $form->model->action->addInsertAction(new ToDoAction());


        $table = new ToDoTable($this);
        $table->filter->andEqual($table->model->userId, (new UserInformation())->getUserId());



        return parent::getHtml();

    }

}