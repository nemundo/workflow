<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WikiAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WikiModel
*/
public $model;

protected function loadSite() {
$this->model = new WikiModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}