<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
}
}