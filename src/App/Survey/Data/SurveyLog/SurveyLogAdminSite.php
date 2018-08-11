<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SurveyLogAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadSite() {
$this->model = new SurveyLogModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}