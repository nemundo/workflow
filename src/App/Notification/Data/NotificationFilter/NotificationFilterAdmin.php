<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  NotificationFilterModel();
}
}