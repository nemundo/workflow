<?php

namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var TextStoreModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new TextStoreModel();
        $this->label = $this->model->label;
    }
}