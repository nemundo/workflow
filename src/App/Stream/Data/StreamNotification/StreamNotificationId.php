<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamNotificationId extends AbstractModelIdValue {
/**
* @var StreamNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
}