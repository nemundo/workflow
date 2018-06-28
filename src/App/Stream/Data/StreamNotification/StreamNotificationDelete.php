<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
}