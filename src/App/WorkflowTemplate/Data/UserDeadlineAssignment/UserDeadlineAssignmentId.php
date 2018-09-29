<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserDeadlineAssignmentId extends AbstractModelIdValue {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
}
}