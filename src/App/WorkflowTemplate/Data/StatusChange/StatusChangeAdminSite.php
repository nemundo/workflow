<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StatusChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new StatusChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}