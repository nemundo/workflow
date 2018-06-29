<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetTypeModel();
$this->label = $this->model->label;
}
}