<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WorkflowModel();
$this->label = $this->model->label;
}
}