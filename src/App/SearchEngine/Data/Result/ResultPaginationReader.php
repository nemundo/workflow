<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var ResultModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
/**
* @return ResultRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ResultRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}