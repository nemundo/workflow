<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WorkflowStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
/**
* @return WorkflowStatusRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WorkflowStatusRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}