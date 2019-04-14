<?php

namespace Nemundo\Workflow\Com\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
//use Nemundo\Html\Form\AbstractSubmitForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Web\Http\Request\PostRequest;

class BootstrapMultiSubmitForm extends AbstractFormBuilder  // AbstractSubmitForm
{

    private $submitName = 'submit';


    protected function addSubmitButton($label, $name)
    {

        //$name = (new TextConvert())->convertToCode($label);

        $submit = new BootstrapSubmitButton($this);
        $submit->label = $label;
        $submit->name = $this->submitName;  // 'submit';
        $submit->value = $name;

    }


    protected function getSubmitValue()
    {


        $value = (new PostRequest($this->submitName))->getValue();
        return $value;

    }


    protected function onSubmit()
    {

    }

}