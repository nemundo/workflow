<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ContentTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new ContentTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}