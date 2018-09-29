<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UserDeadlineAssignmentModel();
}
}