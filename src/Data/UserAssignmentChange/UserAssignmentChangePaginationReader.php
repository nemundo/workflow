<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChangePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UserAssignmentChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
/**
* @return UserAssignmentChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserAssignmentChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}