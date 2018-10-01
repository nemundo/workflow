<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new DashboardContentTypeModel();
}
}