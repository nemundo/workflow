<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\Store\Type\AbstractLargeTextStoreType;


class LargeTextStoreForm extends BootstrapForm
{

    /**
     * @var AbstractLargeTextStoreType
     */
    public $store;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    public function getHtml()
    {

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = $this->store->storeName;  // 'Text';
        $this->text->value = $this->store->getValue();

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $this->store->setValue($this->text->getValue());

    }

}