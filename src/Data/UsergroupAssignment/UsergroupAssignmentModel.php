<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupExternalType
*/
public $usergroup;

protected function loadModel() {
$this->tableName = "workflow_usergroup_assignment";
$this->aliasTableName = "workflow_usergroup_assignment";
$this->label = "Usergroup Assignment";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_usergroup_assignment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_usergroup_assignment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "workflow_usergroup_assignment";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "workflow_usergroup_assignment_workflow";
$this->workflowId->label = "Workflow";

$this->usergroupId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->usergroupId->tableName = "workflow_usergroup_assignment";
$this->usergroupId->fieldName = "usergroup";
$this->usergroupId->aliasFieldName = "workflow_usergroup_assignment_usergroup";
$this->usergroupId->label = "Usergroup";

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType($this, "workflow_usergroup_assignment_workflow");
$this->workflow->tableName = "workflow_usergroup_assignment";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "workflow_usergroup_assignment_workflow";
$this->workflow->label = "Workflow";
}
}
public function loadUsergroup() {
if ($this->usergroup == null) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupExternalType($this, "workflow_usergroup_assignment_usergroup");
$this->usergroup->tableName = "workflow_usergroup_assignment";
$this->usergroup->fieldName = "usergroup";
$this->usergroup->aliasFieldName = "workflow_usergroup_assignment_usergroup";
$this->usergroup->label = "Usergroup";
}
}
}