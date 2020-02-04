<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AssignmentModel();
}
/**
* @return \Nemundo\Workflow\App\Assignment\Row\AssignmentCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return \Nemundo\Workflow\App\Assignment\Row\AssignmentCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Workflow\App\Assignment\Row\AssignmentCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Workflow\App\Assignment\Row\AssignmentCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}