<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $surveyId;

/**
* @var \Nemundo\Workflow\App\Survey\Data\Survey\SurveyRow
*/
public $survey;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

/**
* @var string
*/
public $dataId;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->surveyId = $this->getModelValue($model->surveyId);
if ($model->survey !== null) {
$this->loadNemundoWorkflowAppSurveyDataSurveySurveysurveyRow($model->survey);
}
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
}
private function loadNemundoWorkflowAppSurveyDataSurveySurveysurveyRow($model) {
$this->survey = new \Nemundo\Workflow\App\Survey\Data\Survey\SurveyRow($this->row, $model);
}
private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
}