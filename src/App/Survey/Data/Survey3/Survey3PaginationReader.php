<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3PaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var Survey3Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
/**
* @return Survey3Row[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new Survey3Row($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}