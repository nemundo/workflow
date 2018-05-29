<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "workflow_user_assignment";
$this->aliasTableName = "workflow_user_assignment";
$this->label = "User Assignment";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_user_assignment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_user_assignment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "workflow_user_assignment";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "workflow_user_assignment_workflow";
$this->workflowId->label = "Workflow";

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_user_assignment";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_user_assignment_user";
$this->userId->label = "User";

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType($this, "workflow_user_assignment_workflow");
$this->workflow->tableName = "workflow_user_assignment";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "workflow_user_assignment_workflow";
$this->workflow->label = "Workflow";
}
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_user_assignment_user");
$this->user->tableName = "workflow_user_assignment";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_user_assignment_user";
$this->user->label = "User";
}
}
}