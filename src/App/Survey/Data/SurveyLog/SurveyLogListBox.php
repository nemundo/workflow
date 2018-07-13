<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyLogModel();
$this->label = $this->model->label;
}
}