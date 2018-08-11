<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
}