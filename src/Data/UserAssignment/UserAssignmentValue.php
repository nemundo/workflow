<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
}