<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyLogModel();
}
}