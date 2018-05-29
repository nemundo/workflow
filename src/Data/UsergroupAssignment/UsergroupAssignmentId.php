<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\Id\AbstractModelIdValue;
class UsergroupAssignmentId extends AbstractModelIdValue {
/**
* @var UsergroupAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
}