<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SurveyLogModel
*/
protected $model;

/**
* @var string
*/
public $surveyId;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->surveyId, $this->surveyId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}