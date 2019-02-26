<?php

namespace Nemundo\Workflow\App\ToDo\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;


class ToDoTypeForm extends AbstractContentTreeForm
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
        $process->parentContentType = $this->parentContentType;
        $process->toDo = $this->toDo->getValue();
        $process->saveType();

    }

}