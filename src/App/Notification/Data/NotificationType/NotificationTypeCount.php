<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NotificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
}