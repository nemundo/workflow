<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var PersonalTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
}
/**
* @return PersonalTaskRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PersonalTaskRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}