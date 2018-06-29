<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ToDoModel();
}
}