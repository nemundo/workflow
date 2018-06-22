<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $login;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = PasswordResetRequestModel::class;
$this->externalTableName = "password_reset_password_reset_request";
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
$this->workflowId->label = "";
$this->addType($this->workflowId);

$this->login = new \Nemundo\Model\Type\Text\TextType();
$this->login->fieldName = "login";
$this->login->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->login->aliasFieldName = $this->login->tableName . "_" . $this->login->fieldName;
$this->login->label = "Login";
$this->addType($this->login);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_workflow");
$this->workflow->fieldName = "workflow";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "";
$this->addType($this->workflow);
}
return $this;
}
}