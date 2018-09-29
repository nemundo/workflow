<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NotificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
}