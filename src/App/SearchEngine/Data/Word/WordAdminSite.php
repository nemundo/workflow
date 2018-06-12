<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
use Nemundo\Model\Site\AbstractModelAdminSite;
class WordAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var WordModel
*/
public $model;

protected function loadSite() {
$this->model = new WordModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}