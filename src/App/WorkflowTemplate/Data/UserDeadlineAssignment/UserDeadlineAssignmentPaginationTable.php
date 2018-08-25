<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserDeadlineAssignmentModel();
}
}