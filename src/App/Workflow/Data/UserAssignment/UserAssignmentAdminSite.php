<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UserAssignmentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadSite() {
$this->model = new UserAssignmentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}