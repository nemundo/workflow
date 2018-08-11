<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Model\Form\ModelFormUpdate;
class SurveyFormUpdate extends ModelFormUpdate {
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