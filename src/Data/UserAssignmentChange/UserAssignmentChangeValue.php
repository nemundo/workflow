<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChangeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserAssignmentChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
}