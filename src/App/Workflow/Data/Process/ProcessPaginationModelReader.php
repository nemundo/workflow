<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ProcessModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessModel();
}
/**
* @return ProcessRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ProcessRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}