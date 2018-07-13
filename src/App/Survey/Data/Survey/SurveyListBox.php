<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class SurveyListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyModel();
$this->label = $this->model->label;
}
}