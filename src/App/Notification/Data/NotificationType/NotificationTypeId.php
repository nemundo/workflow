<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\Id\AbstractModelIdValue;
class NotificationTypeId extends AbstractModelIdValue {
/**
* @var NotificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
}