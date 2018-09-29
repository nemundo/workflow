<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationModel();
}
}