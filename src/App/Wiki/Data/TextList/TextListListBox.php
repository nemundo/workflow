<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var TextListModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new TextListModel();
        $this->label = $this->model->label;
    }
}