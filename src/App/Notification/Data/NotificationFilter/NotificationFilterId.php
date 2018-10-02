<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Model\Id\AbstractModelIdValue;
class NotificationFilterId extends AbstractModelIdValue {
/**
* @var NotificationFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
}