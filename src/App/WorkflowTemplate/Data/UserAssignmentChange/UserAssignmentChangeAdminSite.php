<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UserAssignmentChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new UserAssignmentChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}