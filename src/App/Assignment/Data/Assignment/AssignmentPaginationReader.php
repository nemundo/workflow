<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new \Nemundo\Workflow\App\Assignment\Row\AssignmentCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}