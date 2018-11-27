<?php

namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var DashboardContentTypeModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new DashboardContentTypeModel();
        $this->label = $this->model->label;
    }
}