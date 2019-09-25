<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WorkflowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
/**
* @return WorkflowRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WorkflowRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}