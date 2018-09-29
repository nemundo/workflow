<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $notificationType;

protected function loadModel() {
$this->tableName = "notification_notification_type";
$this->aliasTableName = "notification_notification_type";
$this->label = "Notification Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "notification_notification_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "notification_notification_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->notificationType = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->notificationType->tableName = "notification_notification_type";
$this->notificationType->fieldName = "notification_type";
$this->notificationType->aliasFieldName = "notification_notification_type_notification_type";
$this->notificationType->label = "Notification Type";
$this->notificationType->allowNullValue = "";
$this->notificationType->phpClassName = Nemundo\Workflow\App\Notification\Type\AbstractNotificationType::class;

}
}