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
* @var \Nemundo\App\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $notificationTypeId;

/**
* @var \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeExternalType
*/
public $notificationType;

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
$this->id->allowNullValue = "";
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

$this->notificationTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->notificationTypeId->tableName = "notification_notification";
$this->notificationTypeId->fieldName = "notification_type";
$this->notificationTypeId->aliasFieldName = "notification_notification_notification_type";
$this->notificationTypeId->label = "Notification Type";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\App\User\Data\User\UserExternalType($this, "notification_notification_user");
$this->user->tableName = "notification_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "notification_notification_user";
$this->user->label = "User";
}
}
public function loadNotificationType() {
if ($this->notificationType == null) {
$this->notificationType = new \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeExternalType($this, "notification_notification_notification_type");
$this->notificationType->tableName = "notification_notification";
$this->notificationType->fieldName = "notification_type";
$this->notificationType->aliasFieldName = "notification_notification_notification_type";
$this->notificationType->label = "Notification Type";
}
}
}