<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
class WidgetListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WidgetModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WidgetModel();
$this->label = $this->model->label;
}
}