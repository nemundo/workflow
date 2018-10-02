<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var NotificationFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
/**
* @return NotificationFilterRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NotificationFilterRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}