<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TaskAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TaskModel
*/
public $model;

protected function loadSite() {
$this->model = new TaskModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}