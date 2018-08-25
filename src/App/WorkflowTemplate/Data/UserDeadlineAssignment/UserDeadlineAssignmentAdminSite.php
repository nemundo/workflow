<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UserDeadlineAssignmentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadSite() {
$this->model = new UserDeadlineAssignmentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}