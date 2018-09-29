<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\Form\ModelFormUpdate;
class SurveyLogFormUpdate extends ModelFormUpdate {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
$this->model = new SurveyLogModel();
}
}