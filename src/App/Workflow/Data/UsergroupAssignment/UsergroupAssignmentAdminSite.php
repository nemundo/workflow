<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UsergroupAssignmentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadSite() {
$this->model = new UsergroupAssignmentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}