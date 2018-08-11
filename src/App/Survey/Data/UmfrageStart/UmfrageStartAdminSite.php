<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UmfrageStartAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadSite() {
$this->model = new UmfrageStartModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}