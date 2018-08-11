<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TaskModel();
}
}