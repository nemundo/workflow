<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationFilterModel();
}
}