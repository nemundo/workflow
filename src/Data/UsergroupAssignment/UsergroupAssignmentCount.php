<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UsergroupAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
}