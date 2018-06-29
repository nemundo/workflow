<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Model\View\ModelView;
class TaskView extends ModelView {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TaskModel();
}
}