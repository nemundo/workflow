<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
/**
* @return StatusChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StatusChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}