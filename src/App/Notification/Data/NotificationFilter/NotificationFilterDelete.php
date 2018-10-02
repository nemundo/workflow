<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var NotificationFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
}