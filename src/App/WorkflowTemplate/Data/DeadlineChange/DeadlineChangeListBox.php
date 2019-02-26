<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new DeadlineChangeModel();
$this->label = $this->model->label;
}
}