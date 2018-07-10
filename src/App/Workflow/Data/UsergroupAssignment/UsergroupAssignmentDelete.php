<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UsergroupAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
}