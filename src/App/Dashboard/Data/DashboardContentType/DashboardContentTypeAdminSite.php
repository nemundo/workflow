<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class DashboardContentTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new DashboardContentTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}