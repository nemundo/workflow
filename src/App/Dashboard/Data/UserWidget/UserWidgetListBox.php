<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserWidgetModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserWidgetModel();
$this->label = $this->model->label;
}
}