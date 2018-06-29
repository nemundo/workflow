<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Model\Form\ModelFormUpdate;
class TaskFormUpdate extends ModelFormUpdate {
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