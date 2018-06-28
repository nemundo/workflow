<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
}