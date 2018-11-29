<?php

namespace Nemundo\Workflow\App\ToDo\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;
use Nemundo\Workflow\App\ToDo\Content\Type\Status\ToDoErfassungStatus;

class ToDoTypeForm extends ContentTreeForm
{

    /**
     * @var BootstrapTextBox
     */
    private $toDo;


    public function getHtml()
    {

        if ($this->parentContentType !== null) {

            $p = new Paragraph($this);
            $p->content = 'Parent: ' . $this->parentContentType->contentLabel;

        }

        $this->toDo = new BootstrapTextBox($this);
        $this->toDo->label = 'To Do';


        return parent::getHtml();
    }


    protected function onSubmit()
    {


        $process = new ToDoProcess();
        $process->toDo = $this->toDo->getValue();
        $process->saveType();


/*
        $status = new ToDoErfassungStatus();
        $status->parentContentType = $this->parentContentType;
        $status->toDo = $this->toDo->getValue();
        $status->saveType();*/


        //$process = new ToDoProcess($status->dataId);
        //$this->redirectSite = $process->getViewSite();


    }


}