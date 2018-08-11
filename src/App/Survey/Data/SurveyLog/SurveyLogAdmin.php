<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SurveyLogModel();
}
}