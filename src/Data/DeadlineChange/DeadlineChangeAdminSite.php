<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class DeadlineChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new DeadlineChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}