<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class SurveyPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SurveyModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyModel();
}
}