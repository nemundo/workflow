<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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