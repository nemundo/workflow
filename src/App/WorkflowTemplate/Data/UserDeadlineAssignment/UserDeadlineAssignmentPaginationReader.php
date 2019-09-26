<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
}
/**
* @return UserDeadlineAssignmentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserDeadlineAssignmentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}