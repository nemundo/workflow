<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ToDoAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ToDoModel
*/
public $model;

protected function loadSite() {
$this->model = new ToDoModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}