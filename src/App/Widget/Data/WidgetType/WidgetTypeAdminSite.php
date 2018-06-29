<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WidgetTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new WidgetTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}