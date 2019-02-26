<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new DashboardContentTypeModel();
$this->label = $this->model->label;
}
}