<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TaskModel();
}
}