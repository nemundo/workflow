<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowAbortModel();
$this->label = $this->model->label;
}
}