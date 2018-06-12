<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SearchIndexAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadSite() {
$this->model = new SearchIndexModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}