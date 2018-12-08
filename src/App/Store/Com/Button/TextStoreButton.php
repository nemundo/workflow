<?php

namespace Nemundo\Workflow\App\Store\Com\Button;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Workflow\App\Store\Parameter\StoreParameter;
use Nemundo\Workflow\App\Store\Site\TextStoreEditSite;
use Nemundo\Workflow\App\Store\Type\AbstractTextStoreType;

class TextStoreButton extends AdminButton
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

        $this->site = TextStoreEditSite::$site;
        $this->site->addParameter(new StoreParameter($this->store->storeId));

        return parent::getHtml();

    }

}