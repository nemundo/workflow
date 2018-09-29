<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TemplateLargeTextAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadSite() {
$this->model = new TemplateLargeTextModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}