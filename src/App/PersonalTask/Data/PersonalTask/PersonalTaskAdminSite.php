<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Model\Site\AbstractModelAdminSite;
class PersonalTaskAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadSite() {
$this->model = new PersonalTaskModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}