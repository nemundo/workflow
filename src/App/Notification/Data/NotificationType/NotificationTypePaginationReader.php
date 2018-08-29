<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var NotificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
/**
* @return NotificationTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NotificationTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}