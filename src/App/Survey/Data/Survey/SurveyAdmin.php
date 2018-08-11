<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class SurveyAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SurveyModel();
}
}