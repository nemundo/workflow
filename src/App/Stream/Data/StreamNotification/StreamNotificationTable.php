<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamNotificationTable extends BootstrapModelTable {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamNotificationModel();
}
}