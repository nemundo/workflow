<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class TaskTable extends BootstrapModelTable {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
$this->model = new TaskModel();
}
}