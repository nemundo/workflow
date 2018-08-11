<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $surveyId;

/**
* @var \Nemundo\Workflow\App\Survey\Data\Survey\SurveyExternalType
*/
public $survey;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "survey_survey_log";
$this->aliasTableName = "survey_survey_log";
$this->label = "Survey Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "survey_survey_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "survey_survey_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->surveyId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->surveyId->tableName = "survey_survey_log";
$this->surveyId->fieldName = "survey";
$this->surveyId->aliasFieldName = "survey_survey_log_survey";
$this->surveyId->label = "Survey";

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "survey_survey_log";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "survey_survey_log_content_type";
$this->contentTypeId->label = "Content Type";

}
public function loadSurvey() {
if ($this->survey == null) {
$this->survey = new \Nemundo\Workflow\App\Survey\Data\Survey\SurveyExternalType($this, "survey_survey_log_survey");
$this->survey->tableName = "survey_survey_log";
$this->survey->fieldName = "survey";
$this->survey->aliasFieldName = "survey_survey_log_survey";
$this->survey->label = "Survey";
}
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "survey_survey_log_content_type");
$this->contentType->tableName = "survey_survey_log";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "survey_survey_log_content_type";
$this->contentType->label = "Content Type";
}
}
}