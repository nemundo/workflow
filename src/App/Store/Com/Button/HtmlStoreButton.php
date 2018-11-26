<?php

namespace Nemundo\Workflow\App\Store\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Workflow\App\Store\Parameter\StoreParameter;
use Nemundo\Workflow\App\Store\Site\HtmlStoreEditSite;
use Nemundo\Workflow\App\Store\Site\TextStoreEditSite;
use Nemundo\Workflow\App\Store\Type\AbstractTextStoreType;

class HtmlStoreButton extends AdminButton
{

    /**
     * @var AbstractTextStoreType
     */
    public $store;


    protected function loadCom()
    {
        parent::loadCom();

        $this->content = 'edit';

    }


    public function getHtml()
    {

        $this->site = HtmlStoreEditSite::$site;
        $this->site->addParameter(new StoreParameter($this->store->storeId));

        return parent::getHtml();

    }

}