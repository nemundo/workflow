<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyLogModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}