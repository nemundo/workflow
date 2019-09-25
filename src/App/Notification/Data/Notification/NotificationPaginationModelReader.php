<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var NotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
/**
* @return NotificationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NotificationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}