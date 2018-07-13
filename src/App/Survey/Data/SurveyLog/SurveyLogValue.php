<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
}