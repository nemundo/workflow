<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WikiContentTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new WikiContentTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}