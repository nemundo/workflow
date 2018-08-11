<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $surveyId;

/**
* @var \Nemundo\Workflow\App\Survey\Data\Survey\SurveyExternalType
*/
public $survey;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = SurveyLogModel::class;
$this->externalTableName = "survey_survey_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->surveyId = new \Nemundo\Model\Type\Id\IdType();
$this->surveyId->fieldName = "survey";
$this->surveyId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->surveyId->aliasFieldName = $this->surveyId->tableName ."_".$this->surveyId->fieldName;
$this->surveyId->label = "Survey";
$this->addType($this->surveyId);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

}
public function loadSurvey() {
if ($this->survey == null) {
$this->survey = new \Nemundo\Workflow\App\Survey\Data\Survey\SurveyExternalType(null, $this->parentFieldName . "_survey");
$this->survey->fieldName = "survey";
$this->survey->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->survey->aliasFieldName = $this->survey->tableName ."_".$this->survey->fieldName;
$this->survey->label = "Survey";
$this->addType($this->survey);
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName ."_".$this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);
}
return $this;
}
}