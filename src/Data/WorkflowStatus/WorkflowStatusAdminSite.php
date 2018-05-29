<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WorkflowStatusAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadSite() {
$this->model = new WorkflowStatusModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}