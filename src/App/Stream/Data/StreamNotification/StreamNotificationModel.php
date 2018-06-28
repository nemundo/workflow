<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $streamId;

/**
* @var \Nemundo\Workflow\App\Stream\Data\Stream\StreamExternalType
*/
public $stream;

protected function loadModel() {
$this->tableName = "stream_stream_notification";
$this->aliasTableName = "stream_stream_notification";
$this->label = "Stream Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "stream_stream_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "stream_stream_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "stream_stream_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "stream_stream_notification_user";
$this->userId->label = "User";

$this->streamId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->streamId->tableName = "stream_stream_notification";
$this->streamId->fieldName = "stream";
$this->streamId->aliasFieldName = "stream_stream_notification_stream";
$this->streamId->label = "Stream";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "stream_stream_notification_user");
$this->user->tableName = "stream_stream_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "stream_stream_notification_user";
$this->user->label = "User";
}
}
public function loadStream() {
if ($this->stream == null) {
$this->stream = new \Nemundo\Workflow\App\Stream\Data\Stream\StreamExternalType($this, "stream_stream_notification_stream");
$this->stream->tableName = "stream_stream_notification";
$this->stream->fieldName = "stream";
$this->stream->aliasFieldName = "stream_stream_notification_stream";
$this->stream->label = "Stream";
}
}
}