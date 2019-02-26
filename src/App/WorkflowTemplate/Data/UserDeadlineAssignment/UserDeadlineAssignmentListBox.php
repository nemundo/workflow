<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserDeadlineAssignmentModel();
$this->label = $this->model->label;
}
}