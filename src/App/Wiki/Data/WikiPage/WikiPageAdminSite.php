<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WikiPageAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WikiPageModel
*/
public $model;

protected function loadSite() {
$this->model = new WikiPageModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}