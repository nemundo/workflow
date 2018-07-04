<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
/**
* @return WorkflowStatusChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WorkflowStatusChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}