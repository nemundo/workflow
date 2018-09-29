<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\App\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $notificationTypeId;

/**
* @var \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeExternalType
*/
public $notificationType;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = NotificationModel::class;
$this->externalTableName = "notification_notification";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Id";
$this->addType($this->dataId);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->notificationTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->notificationTypeId->fieldName = "notification_type";
$this->notificationTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->notificationTypeId->aliasFieldName = $this->notificationTypeId->tableName ."_".$this->notificationTypeId->fieldName;
$this->notificationTypeId->label = "Notification Type";
$this->addType($this->notificationTypeId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\App\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadNotificationType() {
if ($this->notificationType == null) {
$this->notificationType = new \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeExternalType(null, $this->parentFieldName . "_notification_type");
$this->notificationType->fieldName = "notification_type";
$this->notificationType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->notificationType->aliasFieldName = $this->notificationType->tableName ."_".$this->notificationType->fieldName;
$this->notificationType->label = "Notification Type";
$this->addType($this->notificationType);
}
return $this;
}
}