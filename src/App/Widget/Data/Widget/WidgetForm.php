<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}