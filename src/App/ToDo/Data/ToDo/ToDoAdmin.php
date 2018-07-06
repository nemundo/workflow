<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ToDoModel();
}
}