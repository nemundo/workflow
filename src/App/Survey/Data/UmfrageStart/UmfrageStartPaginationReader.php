<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UmfrageStartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
/**
* @return UmfrageStartRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UmfrageStartRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}