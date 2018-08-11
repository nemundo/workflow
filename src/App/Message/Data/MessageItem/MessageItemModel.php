<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $messageId;

/**
* @var \Nemundo\Workflow\App\Message\Data\Message\MessageExternalType
*/
public $message;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userCreated;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "message_item";
$this->aliasTableName = "message_item";
$this->label = "Message Item";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "message_item";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "message_item_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->messageId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->messageId->tableName = "message_item";
$this->messageId->fieldName = "message";
$this->messageId->aliasFieldName = "message_item_message";
$this->messageId->label = "Message";

$this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userCreatedId->tableName = "message_item";
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->aliasFieldName = "message_item_user_created";
$this->userCreatedId->label = "User Created";

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "message_item";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "message_item_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = "";
$this->dateTimeCreated->visible->form = false;

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "message_item";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "message_item_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "message_item";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "message_item_content_type";
$this->contentTypeId->label = "Content Type";

}
public function loadMessage() {
if ($this->message == null) {
$this->message = new \Nemundo\Workflow\App\Message\Data\Message\MessageExternalType($this, "message_item_message");
$this->message->tableName = "message_item";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "message_item_message";
$this->message->label = "Message";
}
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType($this, "message_item_user_created");
$this->userCreated->tableName = "message_item";
$this->userCreated->fieldName = "user_created";
$this->userCreated->aliasFieldName = "message_item_user_created";
$this->userCreated->label = "User Created";
$this->userCreated->visible->form = false;
}
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "message_item_content_type");
$this->contentType->tableName = "message_item";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "message_item_content_type";
$this->contentType->label = "Content Type";
}
}
}