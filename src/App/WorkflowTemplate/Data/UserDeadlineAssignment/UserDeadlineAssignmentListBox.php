<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserDeadlineAssignmentModel();
$this->label = $this->model->label;
}
}