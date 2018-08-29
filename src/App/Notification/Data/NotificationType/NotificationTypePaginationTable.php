<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationTypeModel();
}
}