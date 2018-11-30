<?php

namespace Nemundo\Workflow\App\Store\Form;


use Nemundo\Com\Html\Form\HiddenInput;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Store\Type\AbstractStoreType;


class AbstractStoreForm extends BootstrapForm
{

    /**
     * @var AbstractStoreType
     */
    public $store;

    /**
     * @var bool
     */
    public $urlRefererRedirect = false;


    /**
     * @var HiddenInput
     */
    private $hidden;

    public function getHtml()
    {

        if ($this->urlRefererRedirect) {
            $this->hidden = new HiddenInput($this);
            if ($this->hidden->getValue() !== '') {
                $this->hidden->value = $this->hidden->getValue();
            } else {
                $this->hidden->value = (new UrlReferer())->getUrl();
            }
        }


        return parent::getHtml();

    }


    protected function getStoreValue()
    {

    }


    protected function onSubmit()
    {

        $this->store->setValue($this->getStoreValue());

        if ($this->urlRefererRedirect) {
            (new UrlRedirect())->redirect($this->hidden->getValue());
        }

    }

}