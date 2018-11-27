<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var WikiTypeModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new WikiTypeModel();
        $this->label = $this->model->label;
    }
}