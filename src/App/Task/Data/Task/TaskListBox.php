<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TaskModel();
$this->label = $this->model->label;
}
}