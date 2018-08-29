<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
$this->model = new ToDoModel();
}
}