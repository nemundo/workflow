<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $archive;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadType() {
parent::loadType();
$this->externalModelClassName = TaskModel::class;
$this->externalTableName = "task_task";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->task = new \Nemundo\Model\Type\Text\TextType();
$this->task->fieldName = "task";
$this->task->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->task->aliasFieldName = $this->task->tableName . "_" . $this->task->fieldName;
$this->task->label = "Task";
$this->addType($this->task);

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Deadline";
$this->addType($this->deadline);

$this->archive = new \Nemundo\Model\Type\Number\YesNoType();
$this->archive->fieldName = "archive";
$this->archive->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->archive->aliasFieldName = $this->archive->tableName . "_" . $this->archive->fieldName;
$this->archive->label = "Archive";
$this->addType($this->archive);

$this->identificationTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->identificationTypeId->fieldName = "identification_type";
$this->identificationTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->identificationTypeId->aliasFieldName = $this->identificationTypeId->tableName ."_".$this->identificationTypeId->fieldName;
$this->identificationTypeId->label = "Identification Type";
$this->addType($this->identificationTypeId);

$this->identificationId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->identificationId->fieldName = "identification_id";
$this->identificationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->identificationId->aliasFieldName = $this->identificationId->tableName . "_" . $this->identificationId->fieldName;
$this->identificationId->label = "Identification Id";
$this->addType($this->identificationId);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeEffort->aliasFieldName = $this->timeEffort->tableName . "_" . $this->timeEffort->fieldName;
$this->timeEffort->label = "Time Effort";
$this->addType($this->timeEffort);

$this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreatedId->aliasFieldName = $this->userCreatedId->tableName ."_".$this->userCreatedId->fieldName;
$this->userCreatedId->label = "User Created";
$this->addType($this->userCreatedId);

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
$this->dateTimeCreated->label = "Date Time Created";
$this->addType($this->dateTimeCreated);

}
public function loadIdentificationType() {
if ($this->identificationType == null) {
$this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeExternalType(null, $this->parentFieldName . "_identification_type");
$this->identificationType->fieldName = "identification_type";
$this->identificationType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->identificationType->aliasFieldName = $this->identificationType->tableName ."_".$this->identificationType->fieldName;
$this->identificationType->label = "Identification Type";
$this->addType($this->identificationType);
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
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_created");
$this->userCreated->fieldName = "user_created";
$this->userCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreated->aliasFieldName = $this->userCreated->tableName ."_".$this->userCreated->fieldName;
$this->userCreated->label = "User Created";
$this->addType($this->userCreated);
}
return $this;
}
}