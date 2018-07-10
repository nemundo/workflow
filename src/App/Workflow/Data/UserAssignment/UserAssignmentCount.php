<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
class UserAssignmentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
}