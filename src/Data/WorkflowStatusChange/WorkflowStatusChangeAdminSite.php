<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WorkflowStatusChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new WorkflowStatusChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}