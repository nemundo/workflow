<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WorkflowAbortAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadSite() {
$this->model = new WorkflowAbortModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}