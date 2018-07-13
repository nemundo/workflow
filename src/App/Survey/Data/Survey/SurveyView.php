<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Model\View\ModelView;
class SurveyView extends ModelView {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyModel();
}
}