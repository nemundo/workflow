<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WorkflowAbortModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
/**
* @return WorkflowAbortRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WorkflowAbortRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}