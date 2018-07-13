<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
}