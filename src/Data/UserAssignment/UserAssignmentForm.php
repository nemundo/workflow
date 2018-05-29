<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}