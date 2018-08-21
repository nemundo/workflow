<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1PaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var Survey1Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey1Model();
}
/**
* @return Survey1Row[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new Survey1Row($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}