<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $statusId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $statusDataId;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $closed;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $todo;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoModel::class;
$this->externalTableName = "todo_todo";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->statusId = new \Nemundo\Model\Type\Id\IdType();
$this->statusId->fieldName = "status";
$this->statusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusId->aliasFieldName = $this->statusId->tableName ."_".$this->statusId->fieldName;
$this->statusId->label = "Status";
$this->addType($this->statusId);

$this->statusDataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->statusDataId->fieldName = "status_data_Id";
$this->statusDataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusDataId->aliasFieldName = $this->statusDataId->tableName . "_" . $this->statusDataId->fieldName;
$this->statusDataId->label = "Id";
$this->addType($this->statusDataId);

$this->closed = new \Nemundo\Model\Type\Number\YesNoType();
$this->closed->fieldName = "closed";
$this->closed->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->closed->aliasFieldName = $this->closed->tableName . "_" . $this->closed->fieldName;
$this->closed->label = "";
$this->addType($this->closed);

$this->todo = new \Nemundo\Model\Type\Text\TextType();
$this->todo->fieldName = "todo";
$this->todo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->todo->aliasFieldName = $this->todo->tableName . "_" . $this->todo->fieldName;
$this->todo->label = "To Do";
$this->addType($this->todo);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Done";
$this->addType($this->done);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_status");
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName ."_".$this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);
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