<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskModel extends \Nemundo\Workflow\Model\AbstractWorkflowBaseModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $archive;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $identificationTypeId;

/**
* @var \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType
*/
public $identificationType;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $identificationId;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Number\DecimalNumberType
*/
public $timeEffort;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userCreated;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $sourceId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $sourceTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $sourceType;

protected function loadModel() {
$this->tableName = "task_task";
$this->aliasTableName = "task_task";
$this->label = "Task";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "task_task";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "task_task_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;


$this->task = new \Nemundo\Model\Type\Text\TextType($this);
$this->task->tableName = "task_task";
$this->task->fieldName = "task";
$this->task->aliasFieldName = "task_task_task";
$this->task->label = "Aufgabe";
$this->task->allowNullValue = "";
$this->task->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "task_task";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "task_task_description";
$this->description->label = "Beschreibung";
$this->description->allowNullValue = "";

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "task_task";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "task_task_deadline";
$this->deadline->label = "Erledigen bis";
$this->deadline->allowNullValue = "";

$this->archive = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->archive->tableName = "task_task";
$this->archive->fieldName = "archive";
$this->archive->aliasFieldName = "task_task_archive";
$this->archive->label = "Erledigt";
$this->archive->allowNullValue = "";

$this->identificationTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->identificationTypeId->tableName = "task_task";
$this->identificationTypeId->fieldName = "identification_type";
$this->identificationTypeId->aliasFieldName = "task_task_identification_type";
$this->identificationTypeId->label = "Identification Type";

$this->identificationId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->identificationId->tableName = "task_task";
$this->identificationId->fieldName = "identification_id";
$this->identificationId->aliasFieldName = "task_task_identification_id";
$this->identificationId->label = "Verantwortlicher";
$this->identificationId->allowNullValue = "";
$this->identificationId->visible->form = false;
$this->identificationId->visible->table = false;
$this->identificationId->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "task_task";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "task_task_content_type";
$this->contentTypeId->label = "Content Type";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "task_task";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "task_task_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->timeEffort->tableName = "task_task";
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->aliasFieldName = "task_task_time_effort";
$this->timeEffort->label = "Aufwand";
$this->timeEffort->allowNullValue = "";

$this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userCreatedId->tableName = "task_task";
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->aliasFieldName = "task_task_user_created";
$this->userCreatedId->label = "Ersteller";

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "task_task";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "task_task_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = "";
$this->dateTimeCreated->visible->form = false;

$this->sourceId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->sourceId->tableName = "task_task";
$this->sourceId->fieldName = "source_id";
$this->sourceId->aliasFieldName = "task_task_source_id";
$this->sourceId->label = "Source Id";
$this->sourceId->allowNullValue = "";
$this->sourceId->visible->form = false;
$this->sourceId->visible->table = false;
$this->sourceId->visible->view = false;
$this->id->visible->form = false;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "task_task";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "task_task_source";
$this->source->label = "Source";
$this->source->allowNullValue = "";
$this->source->length = 255;

$this->sourceTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->sourceTypeId->tableName = "task_task";
$this->sourceTypeId->fieldName = "source_type";
$this->sourceTypeId->aliasFieldName = "task_task_source_type";
$this->sourceTypeId->label = "Source Type";

$this->action->addInsertAction(new \Nemundo\Workflow\App\Task\Action\TaskAction());
}
public function loadIdentificationType() {
if ($this->identificationType == null) {
$this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType($this, "task_task_identification_type");
$this->identificationType->tableName = "task_task";
$this->identificationType->fieldName = "identification_type";
$this->identificationType->aliasFieldName = "task_task_identification_type";
$this->identificationType->label = "Identification Type";
}
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "task_task_content_type");
$this->contentType->tableName = "task_task";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "task_task_content_type";
$this->contentType->label = "Content Type";
}
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType($this, "task_task_user_created");
$this->userCreated->tableName = "task_task";
$this->userCreated->fieldName = "user_created";
$this->userCreated->aliasFieldName = "task_task_user_created";
$this->userCreated->label = "Ersteller";
$this->userCreated->visible->form = false;
}
}
public function loadSourceType() {
if ($this->sourceType == null) {
$this->sourceType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "task_task_source_type");
$this->sourceType->tableName = "task_task";
$this->sourceType->fieldName = "source_type";
$this->sourceType->aliasFieldName = "task_task_source_type";
$this->sourceType->label = "Source Type";
}
}
}