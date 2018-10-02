<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NotificationFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
}