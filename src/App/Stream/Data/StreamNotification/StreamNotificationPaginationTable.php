<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamNotificationModel();
}
}