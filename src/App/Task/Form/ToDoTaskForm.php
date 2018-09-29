<?php

namespace Nemundo\Workflow\App\Task\Form;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTask;
use Nemundo\Workflow\App\Task\Data\Task\Task;

class ToDoTaskForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $task;

    public function getHtml()
    {

        $this->task=new BootstrapTextBox($this);
        $this->task->label = 'Task';

        return parent::getHtml();

    }


    protected function onSubmit()
    {


        $data = new SourceTask();  // Task();
        $data->task = $this->task->getValue();
        $data->deadline = (new Date())->addYear(100);
        $data->assignment->setUserIdentification((new UserInformation())->getUserId());
        $data->source = 'ToDoTask';
        $data->save();




    }


}