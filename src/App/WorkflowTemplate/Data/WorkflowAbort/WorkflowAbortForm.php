<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowAbortModel();
}
}