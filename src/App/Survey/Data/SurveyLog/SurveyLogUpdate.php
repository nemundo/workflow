<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class SurveyLogUpdate extends AbstractModelUpdate {
/**
* @var SurveyLogModel
*/
public $model;

/**
* @var string
*/
public $surveyId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->surveyId, $this->surveyId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
parent::update();
}
}