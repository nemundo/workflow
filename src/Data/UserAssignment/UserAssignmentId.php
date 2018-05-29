<?php
namespace Nemundo\Workflow\Data\UserAssignment;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserAssignmentId extends AbstractModelIdValue {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
}