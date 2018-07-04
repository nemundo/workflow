<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $workflowItemId;

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

protected function loadModel() {
$this->tableName = "workflow_workflow_status_change";
$this->aliasTableName = "workflow_workflow_status_change";
$this->label = "Workflow Status Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_workflow_status_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_workflow_status_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "workflow_workflow_status_change";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "workflow_workflow_status_change_workflow";
$this->workflowId->label = "Workflow";

$this->workflowStatusId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowStatusId->tableName = "workflow_workflow_status_change";
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->aliasFieldName = "workflow_workflow_status_change_workflow_status";
$this->workflowStatusId->label = "Workflow Status";

$this->workflowItemId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->workflowItemId->tableName = "workflow_workflow_status_change";
$this->workflowItemId->fieldName = "workflow_item_id";
$this->workflowItemId->aliasFieldName = "workflow_workflow_status_change_workflow_item_id";
$this->workflowItemId->label = "Workflow Item Id";
$this->workflowItemId->allowNullValue = "";
$this->workflowItemId->visible->form = false;
$this->workflowItemId->visible->table = false;
$this->workflowItemId->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "workflow_workflow_status_change";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_workflow_status_change_user";
$this->userId->label = "User";

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "workflow_workflow_status_change";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "workflow_workflow_status_change_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = "";
$this->dateTime->visible->form = false;

$this->itemOrder = new \Nemundo\Model\Type\Number\ItemOrderType($this);
$this->itemOrder->tableName = "workflow_workflow_status_change";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "workflow_workflow_status_change_item_order";
$this->itemOrder->label = "Item Order";
$this->itemOrder->allowNullValue = "";
$this->itemOrder->visible->form = false;

$this->draft = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->draft->tableName = "workflow_workflow_status_change";
$this->draft->fieldName = "draft";
$this->draft->aliasFieldName = "workflow_workflow_status_change_draft";
$this->draft->label = "Draft";
$this->draft->allowNullValue = "";

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "workflow_workflow_status_change";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "workflow_workflow_status_change_message";
$this->message->label = "Message";
$this->message->allowNullValue = "";

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType($this, "workflow_workflow_status_change_workflow");
$this->workflow->tableName = "workflow_workflow_status_change";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "workflow_workflow_status_change_workflow";
$this->workflow->label = "Workflow";
}
}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusExternalType($this, "workflow_workflow_status_change_workflow_status");
$this->workflowStatus->tableName = "workflow_workflow_status_change";
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->aliasFieldName = "workflow_workflow_status_change_workflow_status";
$this->workflowStatus->label = "Workflow Status";
}
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_workflow_status_change_user");
$this->user->tableName = "workflow_workflow_status_change";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_workflow_status_change_user";
$this->user->label = "User";
$this->user->visible->form = false;
}
}
}