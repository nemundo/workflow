<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $notificationType;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = NotificationTypeModel::class;
$this->externalTableName = "notification_notification_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->notificationType = new \Nemundo\Model\Type\Php\PhpClassType();
$this->notificationType->fieldName = "notification_type";
$this->notificationType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->notificationType->aliasFieldName = $this->notificationType->tableName . "_" . $this->notificationType->fieldName;
$this->notificationType->label = "Notification Type";
$this->addType($this->notificationType);

}
}