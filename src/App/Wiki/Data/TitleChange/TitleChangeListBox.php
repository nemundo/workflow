<?php

namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var TitleChangeModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new TitleChangeModel();
        $this->label = $this->model->label;
    }
}