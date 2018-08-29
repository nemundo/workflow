<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Model\Form\ModelFormUpdate;
class ToDoFormUpdate extends ModelFormUpdate {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
$this->model = new ToDoModel();
}
}