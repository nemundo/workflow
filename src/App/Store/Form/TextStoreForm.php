<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TextStoreForm extends AbstractStoreForm
{

    /**
     * @var BootstrapTextBox
     */
    private $text;


    public function getHtml()
    {

        $this->text = new BootstrapTextBox($this);
        $this->text->label = $this->store->storeName;
        $this->text->value = $this->store->getValue();

        return parent::getHtml();

    }


    protected function getStoreValue()
    {
        $value = $this->text->getValue();
        return $value;
    }

}