<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChangeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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