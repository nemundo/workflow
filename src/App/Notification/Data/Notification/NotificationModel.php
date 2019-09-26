<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationModel extends \Nemundo\App\Content\Model\AbstractDataIdModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $read;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $archive;

protected function loadModel() {
$this->tableName = "notification_notification";
$this->aliasTableName = "notification_notification";
$this->label = "Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "notification_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "notification_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "notification_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "notification_notification_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;
$this->loadUser();

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "notification_notification";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "notification_notification_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "notification_notification";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "notification_notification_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "notification_notification";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "notification_notification_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "notification_notification";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "notification_notification_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = false;
$this->dateTimeCreated->visible->form = false;

$this->read = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->read->tableName = "notification_notification";
$this->read->fieldName = "read";
$this->read->aliasFieldName = "notification_notification_read";
$this->read->label = "Read";
$this->read->allowNullValue = false;

$this->archive = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->archive->tableName = "notification_notification";
$this->archive->fieldName = "archive";
$this->archive->aliasFieldName = "notification_notification_archive";
$this->archive->label = "Archive";
$this->archive->allowNullValue = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "notification_notification_user");
$this->user->tableName = "notification_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "notification_notification_user";
$this->user->label = "User";
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "notification_notification_content_type");
$this->contentType->tableName = "notification_notification";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "notification_notification_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}