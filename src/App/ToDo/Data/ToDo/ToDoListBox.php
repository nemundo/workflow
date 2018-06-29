<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ToDoModel();
$this->label = $this->model->label;
}
}