<?php

namespace Nemundo\Workflow\App\ToDo\Action;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\ToDo\Content\ToDoContentType;
use Nemundo\Workflow\App\ToDo\Data\ToDo\AbstractToDoAction;
use Nemundo\Workflow\Stream\Builder\StreamBuilder;

class ToDoAction extends AbstractToDoAction
{

    public function run($id)
    {

        $todoRow = $this->getRow();

        /*$builder = new StreamBuilder();
        $builder->contentType = new ToDoContentType();
        $builder->dataId = $this->id;
        $builder->subject = $todoRow->todo;
        $builder->createItem();*/

        $builder = new TaskBuilder();
        $builder->contentType = new ToDoContentType();
        $builder->dataId = $this->id;
        $builder->task = $todoRow->todo;
        //$builder->deadline = (new Date())->setNow()->addDay(2)minusDay(1);
        //$builder->timeEffort = 1.5;
        //$builder->identificationType = new UserIdentificationType();
        //$builder->identificationId = ;
        $builder->createUserTask((new UserInformation())->getUserId());


    }

}