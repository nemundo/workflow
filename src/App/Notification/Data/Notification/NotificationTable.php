<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class NotificationTable extends BootstrapModelTable {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationModel();
}
}