<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
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