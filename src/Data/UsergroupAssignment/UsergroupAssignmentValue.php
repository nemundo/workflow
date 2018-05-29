<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UsergroupAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
}