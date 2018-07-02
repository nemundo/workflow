<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $archive;

protected function loadModel() {
$this->tableName = "inbox_inbox";
$this->aliasTableName = "inbox_inbox";
$this->label = "Inbox";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "inbox_inbox";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "inbox_inbox_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "inbox_inbox";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "inbox_inbox_content_type";
$this->contentTypeId->label = "Content Type";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "inbox_inbox";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "inbox_inbox_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "inbox_inbox";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "inbox_inbox_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = "";
$this->subject->length = 255;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "inbox_inbox";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "inbox_inbox_message";
$this->message->label = "Message";
$this->message->allowNullValue = "";

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "inbox_inbox";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "inbox_inbox_user";
$this->userId->label = "User";

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "inbox_inbox";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "inbox_inbox_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = "";
$this->dateTime->visible->form = false;

$this->archive = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->archive->tableName = "inbox_inbox";
$this->archive->fieldName = "archive";
$this->archive->aliasFieldName = "inbox_inbox_archive";
$this->archive->label = "Archive";
$this->archive->allowNullValue = "";

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType($this, "inbox_inbox_content_type");
$this->contentType->tableName = "inbox_inbox";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "inbox_inbox_content_type";
$this->contentType->label = "Content Type";
}
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "inbox_inbox_user");
$this->user->tableName = "inbox_inbox";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "inbox_inbox_user";
$this->user->label = "User";
}
}
}