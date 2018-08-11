<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}