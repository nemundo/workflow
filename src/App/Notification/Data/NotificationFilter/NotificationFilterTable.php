<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class NotificationFilterTable extends BootstrapModelTable {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationFilterModel();
}
}