<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UsergroupAssignmentModel();
}
}