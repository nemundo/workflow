<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $dataId;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\App\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $notificationTypeId;

/**
* @var \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeRow
*/
public $notificationType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dataId = $this->getModelValue($model->dataId);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoAppUserDataUserUseruserRow($model->user);
}
$this->notificationTypeId = $this->getModelValue($model->notificationTypeId);
if ($model->notificationType !== null) {
$this->loadNemundoWorkflowAppNotificationDataNotificationTypeNotificationTypenotificationTypeRow($model->notificationType);
}
}
private function loadNemundoAppUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\App\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppNotificationDataNotificationTypeNotificationTypenotificationTypeRow($model) {
$this->notificationType = new \Nemundo\Workflow\App\Notification\Data\NotificationType\NotificationTypeRow($this->row, $model);
}
}