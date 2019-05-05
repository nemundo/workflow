<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Com\FormBuilder\Item\HiddenFormItem;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCkEditor5Editor;
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
     * @var HiddenFormItem
     */
    private $hidden;

    public function getContent()
    {

        $this->text = new BootstrapCkEditor5Editor($this);  // new BootstrapHtmlEditor($this);
        $this->text->label = $this->store->storeLabel;
        $this->text->value = $this->store->getValue();

        $this->hidden = new HiddenFormItem($this);
        $this->hidden->name = 'redirect';
        if ($this->hidden->hasValue()) {
            $this->hidden->value = $this->hidden->getValue();
        } else {
            $this->hidden->value = (new UrlReferer())->getUrl();
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->store->setValue($this->text->getValue());
        (new UrlRedirect())->redirect($this->hidden->getValue());

    }

}