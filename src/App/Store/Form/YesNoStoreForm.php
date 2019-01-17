<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class YesNoStoreForm extends AbstractStoreForm
{

    /**
     * @var BootstrapCheckBox
     */
    private $checkbox;


    public function getHtml()
    {

        $this->checkbox = new BootstrapCheckBox($this);
        $this->checkbox->label = $this->store->storeLabel;
        $this->checkbox->value = $this->store->getValue();

        return parent::getHtml();

    }


    protected function getStoreValue()
    {
        $value = $this->checkbox->getValue();
        return $value;
    }

}