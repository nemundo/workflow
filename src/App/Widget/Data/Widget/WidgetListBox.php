<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetModel();
$this->label = $this->model->label;
}
}