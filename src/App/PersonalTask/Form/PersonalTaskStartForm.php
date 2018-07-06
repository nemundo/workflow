<?php

namespace Nemundo\Workflow\App\PersonalTask\Form;


use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Workflow\Form\Start\WorkflowStartForm;

class PersonalTaskStartForm extends WorkflowStartForm
{

    public function getHtml()
    {

        $this->process =new PersonalTaskProcess();
        return parent::getHtml();

    }

}