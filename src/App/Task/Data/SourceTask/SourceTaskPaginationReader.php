<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
/**
* @return SourceTaskRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SourceTaskRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}