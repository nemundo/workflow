<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SurveyAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SurveyModel
*/
public $model;

protected function loadSite() {
$this->model = new SurveyModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}