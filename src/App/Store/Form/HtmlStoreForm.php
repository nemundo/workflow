<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Com\Html\Form\HiddenInput;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapHtmlEditor;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Store\Type\AbstractLargeTextStoreType;


class HtmlStoreForm extends BootstrapForm
{

    /**
     * @var AbstractLargeTextStoreType
     */
    public $store;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    /**
     * @var HiddenInput
     */
    private $hidden;

    public function getHtml()
    {

        $this->text = new BootstrapHtmlEditor($this);
        $this->text->label = $this->store->storeName;  // 'Text';
        $this->text->value = $this->store->getValue();

        $this->hidden = new HiddenInput($this);
        if ($this->hidden->getValue() !== '') {
            $this->hidden->value = $this->hidden->getValue();
        } else {
            $this->hidden->value = (new UrlReferer())->getUrl();
        }


        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $this->store->setValue($this->text->getValue());

        (new UrlRedirect())->redirect($this->hidden->getValue());

    }

}