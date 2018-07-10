<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
class UserNotificationPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UserNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
/**
* @return UserNotificationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserNotificationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}