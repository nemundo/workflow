<?php

namespace Nemundo\Workflow\App\Store\Admin;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\App\Store\Form\LargeTextStoreForm;
use Nemundo\Workflow\App\Store\Type\AbstractStoreType;

class StoreAdmin extends AbstractHtmlContainerList
{

    /**
     * @var AbstractStoreType[]
     */
    private $storeList = [];

    public function addStore(AbstractStoreType $store)
    {
        $this->storeList[] = $store;
        return $this;
    }


    public function getHtml()
    {

        /*
        $form = new SearchForm($this);

        $listbox = new BootstrapListBox($form);
        $listbox->label = 'Textbaustein';
        $listbox->submitOnChange = true;
        $listbox->value = $listbox->getValue();

        foreach ($this->storeList as $store) {
            $listbox->addItem($store->storeName);
        }

      $storeId =   $listbox->getValue();*/

        foreach ($this->storeList as $store) {
            //$listbox->addItem($store->storeName);

            $form = new LargeTextStoreForm($this);
            $form->store = $store;

        }


        return parent::getHtml();

    }

}