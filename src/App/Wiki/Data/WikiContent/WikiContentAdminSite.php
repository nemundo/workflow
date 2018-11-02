<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WikiContentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WikiContentModel
*/
public $model;

protected function loadSite() {
$this->model = new WikiContentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}