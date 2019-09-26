<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AssignmentFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AssignmentFilterModel();
}
/**
* @return AssignmentFilterRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AssignmentFilterRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}