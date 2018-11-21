<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $processId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $number;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $workflowNumber;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $draft;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $closed;

/**
* @var \Nemundo\Model\Type\Number\ItemOrderType
*/
public $itemOrder;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowStatusId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\User\ModifiedUserType
*/
public $userModifiedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userModified;

/**
* @var \Nemundo\Model\Type\DateTime\ModifiedDateTimeType
*/
public $dateTimeModified;

/**
* @var \Nemundo\Workflow\App\Identification\Model\IdentificationModelType
*/
public $assignment;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WorkflowModel::class;
$this->externalTableName = "workflow_workflow";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->processId = new \Nemundo\Model\Type\Id\IdType();
$this->processId->fieldName = "process";
$this->processId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->processId->aliasFieldName = $this->processId->tableName ."_".$this->processId->fieldName;
$this->processId->label = "Process";
$this->addType($this->processId);

$this->number = new \Nemundo\Model\Type\Number\NumberType();
$this->number->fieldName = "number";
$this->number->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->number->aliasFieldName = $this->number->tableName . "_" . $this->number->fieldName;
$this->number->label = "Number";
$this->addType($this->number);

$this->workflowNumber = new \Nemundo\Model\Type\Text\TextType();
$this->workflowNumber->fieldName = "workflow_number";
$this->workflowNumber->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowNumber->aliasFieldName = $this->workflowNumber->tableName . "_" . $this->workflowNumber->fieldName;
$this->workflowNumber->label = "Nr.";
$this->addType($this->workflowNumber);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->draft = new \Nemundo\Model\Type\Number\YesNoType();
$this->draft->fieldName = "draft";
$this->draft->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->draft->aliasFieldName = $this->draft->tableName . "_" . $this->draft->fieldName;
$this->draft->label = "Draft";
$this->addType($this->draft);

$this->closed = new \Nemundo\Model\Type\Number\YesNoType();
$this->closed->fieldName = "closed";
$this->closed->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->closed->aliasFieldName = $this->closed->tableName . "_" . $this->closed->fieldName;
$this->closed->label = "Abgeschlossen";
$this->addType($this->closed);

$this->itemOrder = new \Nemundo\Model\Type\Number\ItemOrderType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

$this->workflowStatusId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatusId->aliasFieldName = $this->workflowStatusId->tableName ."_".$this->workflowStatusId->fieldName;
$this->workflowStatusId->label = "Status";
$this->addType($this->workflowStatusId);

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Erledigen bis";
$this->addType($this->deadline);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "Ersteller";
$this->addType($this->userId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->userModifiedId = new \Nemundo\Model\Type\User\ModifiedUserType();
$this->userModifiedId->fieldName = "user_modified";
$this->userModifiedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userModifiedId->aliasFieldName = $this->userModifiedId->tableName ."_".$this->userModifiedId->fieldName;
$this->userModifiedId->label = "User Modified";
$this->addType($this->userModifiedId);

$this->dateTimeModified = new \Nemundo\Model\Type\DateTime\ModifiedDateTimeType();
$this->dateTimeModified->fieldName = "date_time_modified";
$this->dateTimeModified->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeModified->aliasFieldName = $this->dateTimeModified->tableName . "_" . $this->dateTimeModified->fieldName;
$this->dateTimeModified->label = "Date Time Modified";
$this->addType($this->dateTimeModified);

$this->assignment = new \Nemundo\Workflow\App\Identification\Model\IdentificationModelType();
$this->assignment->fieldName = "assignment";
$this->assignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->assignment->aliasFieldName = $this->assignment->tableName . "_" . $this->assignment->fieldName;
$this->assignment->label = "Assignment";
$this->assignment->createObject();
$this->addType($this->assignment);

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\App\Workflow\Data\Process\ProcessExternalType(null, $this->parentFieldName . "_process");
$this->process->fieldName = "process";
$this->process->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->process->aliasFieldName = $this->process->tableName ."_".$this->process->fieldName;
$this->process->label = "Process";
$this->addType($this->process);
}
return $this;
}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_workflow_status");
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatus->aliasFieldName = $this->workflowStatus->tableName ."_".$this->workflowStatus->fieldName;
$this->workflowStatus->label = "Status";
$this->addType($this->workflowStatus);
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "Ersteller";
$this->addType($this->user);
}
return $this;
}
public function loadUserModified() {
if ($this->userModified == null) {
$this->userModified = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_modified");
$this->userModified->fieldName = "user_modified";
$this->userModified->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userModified->aliasFieldName = $this->userModified->tableName ."_".$this->userModified->fieldName;
$this->userModified->label = "User Modified";
$this->addType($this->userModified);
}
return $this;
}
}