<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SubjectChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new SubjectChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}