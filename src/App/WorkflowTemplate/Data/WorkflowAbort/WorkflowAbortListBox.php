<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WorkflowAbortModel();
$this->label = $this->model->label;
}
}