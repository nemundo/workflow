<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

/**
* @var \Nemundo\Workflow\App\Identification\Model\IdentificationModelType
*/
public $assignment;

protected function loadModel() {
$this->tableName = "workflow_status_change";
$this->aliasTableName = "workflow_status_change";
$this->label = "Status Change";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_status_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_status_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "workflow_status_change";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "workflow_status_change_workflow";
$this->workflowId->label = "Workflow";
$this->workflowId->allowNullValue = false;

$this->workflowStatusId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowStatusId->tableName = "workflow_status_change";
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->aliasFieldName = "workflow_status_change_workflow_status";
$this->workflowStatusId->label = "Workflow Status";
$this->workflowStatusId->allowNullValue = false;

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "workflow_status_change";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "workflow_status_change_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = false;
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "workflow_status_change";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_status_change_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "workflow_status_change";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "workflow_status_change_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;
$this->dateTime->visible->form = false;

$this->itemOrder = new \Nemundo\Model\Type\Number\ItemOrderType($this);
$this->itemOrder->tableName = "workflow_status_change";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "workflow_status_change_item_order";
$this->itemOrder->label = "Item Order";
$this->itemOrder->allowNullValue = false;
$this->itemOrder->visible->form = false;

$this->draft = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->draft->tableName = "workflow_status_change";
$this->draft->fieldName = "draft";
$this->draft->aliasFieldName = "workflow_status_change_draft";
$this->draft->label = "Draft";
$this->draft->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "workflow_status_change";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "workflow_status_change_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

$this->assignment = new \Nemundo\Workflow\App\Identification\Model\IdentificationModelType($this);
$this->assignment->tableName = "workflow_status_change";
$this->assignment->fieldName = "assignment";
$this->assignment->aliasFieldName = "workflow_status_change_assignment";
$this->assignment->label = "Assignment";
$this->assignment->allowNullValue = false;

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType($this, "workflow_status_change_workflow");
$this->workflow->tableName = "workflow_status_change";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "workflow_status_change_workflow";
$this->workflow->label = "Workflow";
}
return $this;
}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "workflow_status_change_workflow_status");
$this->workflowStatus->tableName = "workflow_status_change";
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->aliasFieldName = "workflow_status_change_workflow_status";
$this->workflowStatus->label = "Workflow Status";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_status_change_user");
$this->user->tableName = "workflow_status_change";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_status_change_user";
$this->user->label = "User";
$this->user->visible->form = false;
}
return $this;
}
}