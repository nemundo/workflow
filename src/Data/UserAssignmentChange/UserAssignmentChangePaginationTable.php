<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentChangeModel();
}
}