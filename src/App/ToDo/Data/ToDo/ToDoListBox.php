<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ToDoModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new ToDoModel();
$this->label = $this->model->label;
}
}