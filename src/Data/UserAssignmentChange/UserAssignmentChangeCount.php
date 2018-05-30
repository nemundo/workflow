<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChangeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserAssignmentChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
}