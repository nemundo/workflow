<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
/**
* @return ToDoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ToDoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}