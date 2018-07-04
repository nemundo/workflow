<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}