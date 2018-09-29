<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $notificationType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->notificationType = $this->getModelValue($model->notificationType);
}
/**
* @return \Nemundo\Workflow\App\Notification\Type\AbstractNotificationType
*/
public function getNotificationTypeObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->notificationType);
return $object;
}
}