<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}