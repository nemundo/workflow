<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserDeadlineAssignmentModel();
}
}