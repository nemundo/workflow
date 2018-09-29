<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ResultAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ResultModel
*/
public $model;

protected function loadSite() {
$this->model = new ResultModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}