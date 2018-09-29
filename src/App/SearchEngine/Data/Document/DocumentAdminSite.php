<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
use Nemundo\Model\Site\AbstractModelAdminSite;
class DocumentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var DocumentModel
*/
public $model;

protected function loadSite() {
$this->model = new DocumentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}