<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
}