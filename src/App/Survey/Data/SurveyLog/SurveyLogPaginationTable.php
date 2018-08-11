<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SurveyLogModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SurveyLogModel();
}
}