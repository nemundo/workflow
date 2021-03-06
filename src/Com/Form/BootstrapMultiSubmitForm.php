<?php

namespace Nemundo\Workflow\Com\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;


class BootstrapMultiSubmitForm extends AbstractFormBuilder
{

    /**
     * @var string
     */
    private $submitName = 'submit';


    protected function addSubmitButton($label, $name)
    {

        $submit = new BootstrapSubmitButton($this);
        $submit->label = $label;
        $submit->name = $this->submitName;
        $submit->value = $name;

    }


    protected function getSubmitValue()
    {

        $parameter = new PostRequest($this->submitName);
        //$parameter->parameterName = $this->submitName;
        $value = $parameter->getValue();

        return $value;

    }


    protected function onSubmit()
    {

    }

}