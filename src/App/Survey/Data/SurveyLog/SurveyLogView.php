<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\View\ModelView;
class SurveyLogView extends ModelView {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyLogModel();
}
}