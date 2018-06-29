<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}