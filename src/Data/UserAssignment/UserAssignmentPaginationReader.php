<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
/**
* @return UserAssignmentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserAssignmentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}