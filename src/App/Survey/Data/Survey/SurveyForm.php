<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class SurveyForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}