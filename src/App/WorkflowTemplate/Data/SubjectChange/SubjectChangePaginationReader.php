<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
/**
* @return SubjectChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SubjectChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}