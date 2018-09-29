<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class NotificationTypeTable extends BootstrapModelTable {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationTypeModel();
}
}