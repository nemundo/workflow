<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TaskModel
*/
public $model;

protected function loadCom() {
$this->model = new TaskModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}