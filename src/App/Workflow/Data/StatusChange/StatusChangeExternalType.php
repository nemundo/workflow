<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowStatusId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

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
* @var \Nemundo\Model\Type\Number\ItemOrderType
*/
public $itemOrder;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $draft;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = StatusChangeModel::class;
$this->externalTableName = "workflow_status_change";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->workflowId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowId->fieldName = "workflow";
$this->workflowId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowId->aliasFieldName = $this->workflowId->tableName ."_".$this->workflowId->fieldName;
$this->workflowId->label = "Workflow";
$this->addType($this->workflowId);

$this->workflowStatusId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatusId->aliasFieldName = $this->workflowStatusId->tableName ."_".$this->workflowStatusId->fieldName;
$this->workflowStatusId->label = "Workflow Status";
$this->addType($this->workflowStatusId);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->itemOrder = new \Nemundo\Model\Type\Number\ItemOrderType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

$this->draft = new \Nemundo\Model\Type\Number\YesNoType();
$this->draft->fieldName = "draft";
$this->draft->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->draft->aliasFieldName = $this->draft->tableName . "_" . $this->draft->fieldName;
$this->draft->label = "Draft";
$this->addType($this->draft);

$this->message = new \Nemundo\Model\Type\Text\LargeTextType();
$this->message->fieldName = "message";
$this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
$this->message->label = "Message";
$this->addType($this->message);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_workflow");
$this->workflow->fieldName = "workflow";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "Workflow";
$this->addType($this->workflow);
}
return $this;
}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_workflow_status");
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatus->aliasFieldName = $this->workflowStatus->tableName ."_".$this->workflowStatus->fieldName;
$this->workflowStatus->label = "Workflow Status";
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
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}