<?php
namespace Nemundo\Workflow\Data\Process;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ProcessAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ProcessModel
*/
public $model;

protected function loadSite() {
$this->model = new ProcessModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}