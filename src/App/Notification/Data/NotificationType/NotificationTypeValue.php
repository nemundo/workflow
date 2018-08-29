<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var NotificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
}