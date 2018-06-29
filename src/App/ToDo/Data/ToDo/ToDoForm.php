<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
$this->model = new ToDoModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}