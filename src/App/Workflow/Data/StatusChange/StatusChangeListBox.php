<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new StatusChangeModel();
$this->label = $this->model->label;
}
}