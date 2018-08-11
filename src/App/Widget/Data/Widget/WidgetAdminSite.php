<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WidgetAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WidgetModel
*/
public $model;

protected function loadSite() {
$this->model = new WidgetModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}