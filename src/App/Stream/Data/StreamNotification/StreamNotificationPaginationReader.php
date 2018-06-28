<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StreamNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
/**
* @return StreamNotificationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamNotificationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}