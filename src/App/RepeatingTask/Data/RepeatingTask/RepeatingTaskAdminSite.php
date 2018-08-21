<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\Site\AbstractModelAdminSite;
class RepeatingTaskAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadSite() {
$this->model = new RepeatingTaskModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}