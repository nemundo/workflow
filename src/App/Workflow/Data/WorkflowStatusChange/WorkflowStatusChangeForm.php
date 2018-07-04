<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}