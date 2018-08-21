<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var RepeatingTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
/**
* @return RepeatingTaskRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RepeatingTaskRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}