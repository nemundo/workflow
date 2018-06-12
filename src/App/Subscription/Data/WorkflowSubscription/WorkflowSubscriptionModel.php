<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "subscription_workflowsubscription";
$this->aliasTableName = "subscription_workflowsubscription";
$this->label = "WorkflowSubscription";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "subscription_workflowsubscription";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "subscription_workflowsubscription_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "subscription_workflowsubscription";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "subscription_workflowsubscription_workflow";
$this->workflowId->label = "Workflow";

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "subscription_workflowsubscription";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "subscription_workflowsubscription_user";
$this->userId->label = "User";

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType($this, "subscription_workflowsubscription_workflow");
$this->workflow->tableName = "subscription_workflowsubscription";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "subscription_workflowsubscription_workflow";
$this->workflow->label = "Workflow";
}
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "subscription_workflowsubscription_user");
$this->user->tableName = "subscription_workflowsubscription";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "subscription_workflowsubscription_user";
$this->user->label = "User";
}
}
}