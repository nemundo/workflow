<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $streamGroupId;

/**
* @var \Nemundo\Workflow\App\Stream\Data\StreamGroup\StreamGroupExternalType
*/
public $streamGroup;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = StreamGroupMemberModel::class;
$this->externalTableName = "stream_stream_group_member";
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

$this->streamGroupId = new \Nemundo\Model\Type\Id\IdType();
$this->streamGroupId->fieldName = "stream_group";
$this->streamGroupId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->streamGroupId->aliasFieldName = $this->streamGroupId->tableName ."_".$this->streamGroupId->fieldName;
$this->streamGroupId->label = "Stream Group";
$this->addType($this->streamGroupId);

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
public function loadStreamGroup() {
if ($this->streamGroup == null) {
$this->streamGroup = new \Nemundo\Workflow\App\Stream\Data\StreamGroup\StreamGroupExternalType(null, $this->parentFieldName . "_stream_group");
$this->streamGroup->fieldName = "stream_group";
$this->streamGroup->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->streamGroup->aliasFieldName = $this->streamGroup->tableName ."_".$this->streamGroup->fieldName;
$this->streamGroup->label = "Stream Group";
$this->addType($this->streamGroup);
}
return $this;
}
}