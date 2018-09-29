<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2PaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var Survey2Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey2Model();
}
/**
* @return Survey2Row[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new Survey2Row($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}