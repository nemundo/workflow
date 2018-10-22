<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WikiTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new WikiTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}