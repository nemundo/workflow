<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class SurveyLogId extends AbstractModelIdValue {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
}