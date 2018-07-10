<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
class UserAssignmentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentModel();
}
}