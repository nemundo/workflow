<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UsergroupAssignmentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}