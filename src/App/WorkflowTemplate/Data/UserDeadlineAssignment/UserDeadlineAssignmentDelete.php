<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
}
}