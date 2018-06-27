<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $statusChangeId;

/**
* @var \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeExternalType
*/
public $statusChange;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $read;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $delete;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = UserNotificationModel::class;
$this->externalTableName = "workflow_user_notification";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->statusChangeId = new \Nemundo\Model\Type\Id\IdType();
$this->statusChangeId->fieldName = "status_change";
$this->statusChangeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusChangeId->aliasFieldName = $this->statusChangeId->tableName ."_".$this->statusChangeId->fieldName;
$this->statusChangeId->label = "Status Change";
$this->addType($this->statusChangeId);

$this->read = new \Nemundo\Model\Type\Number\YesNoType();
$this->read->fieldName = "read";
$this->read->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->read->aliasFieldName = $this->read->tableName . "_" . $this->read->fieldName;
$this->read->label = "Read";
$this->addType($this->read);

$this->delete = new \Nemundo\Model\Type\Number\YesNoType();
$this->delete->fieldName = "delete";
$this->delete->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->delete->aliasFieldName = $this->delete->tableName . "_" . $this->delete->fieldName;
$this->delete->label = "Delete";
$this->addType($this->delete);

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
public function loadStatusChange() {
if ($this->statusChange == null) {
$this->statusChange = new \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeExternalType(null, $this->parentFieldName . "_status_change");
$this->statusChange->fieldName = "status_change";
$this->statusChange->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusChange->aliasFieldName = $this->statusChange->tableName ."_".$this->statusChange->fieldName;
$this->statusChange->label = "Status Change";
$this->addType($this->statusChange);
}
return $this;
}
}