<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StreamNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
}