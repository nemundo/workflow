<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $streamId;

/**
* @var \Nemundo\Workflow\App\Stream\Data\Stream\StreamExternalType
*/
public $stream;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = StreamNotificationModel::class;
$this->externalTableName = "stream_stream_notification";
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

$this->streamId = new \Nemundo\Model\Type\Id\IdType();
$this->streamId->fieldName = "stream";
$this->streamId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->streamId->aliasFieldName = $this->streamId->tableName ."_".$this->streamId->fieldName;
$this->streamId->label = "Stream";
$this->addType($this->streamId);

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
public function loadStream() {
if ($this->stream == null) {
$this->stream = new \Nemundo\Workflow\App\Stream\Data\Stream\StreamExternalType(null, $this->parentFieldName . "_stream");
$this->stream->fieldName = "stream";
$this->stream->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->stream->aliasFieldName = $this->stream->tableName ."_".$this->stream->fieldName;
$this->stream->label = "Stream";
$this->addType($this->stream);
}
return $this;
}
}