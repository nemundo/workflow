<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DeadlineChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DeadlineChangeModel();
}
/**
* @return DeadlineChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DeadlineChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}