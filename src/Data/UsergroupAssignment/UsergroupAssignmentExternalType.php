<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupExternalType
*/
public $usergroup;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = UsergroupAssignmentModel::class;
$this->externalTableName = "workflow_usergroup_assignment";
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

$this->usergroupId = new \Nemundo\Model\Type\Id\IdType();
$this->usergroupId->fieldName = "usergroup";
$this->usergroupId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroupId->aliasFieldName = $this->usergroupId->tableName ."_".$this->usergroupId->fieldName;
$this->usergroupId->label = "Usergroup";
$this->addType($this->usergroupId);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_workflow");
$this->workflow->fieldName = "workflow";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "Workflow";
$this->addType($this->workflow);
}
return $this;
}
public function loadUsergroup() {
if ($this->usergroup == null) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupExternalType(null, $this->parentFieldName . "_usergroup");
$this->usergroup->fieldName = "usergroup";
$this->usergroup->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroup->aliasFieldName = $this->usergroup->tableName ."_".$this->usergroup->fieldName;
$this->usergroup->label = "Usergroup";
$this->addType($this->usergroup);
}
return $this;
}
}