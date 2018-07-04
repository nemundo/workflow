<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WorkflowAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WorkflowModel
*/
public $model;

protected function loadSite() {
$this->model = new WorkflowModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}