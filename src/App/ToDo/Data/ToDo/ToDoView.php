<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Model\View\ModelView;
class ToDoView extends ModelView {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ToDoModel();
}
}