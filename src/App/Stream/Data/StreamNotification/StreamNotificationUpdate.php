<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamNotificationUpdate extends AbstractModelUpdate {
/**
* @var StreamNotificationModel
*/
public $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $streamId;

public function __construct() {
parent::__construct();
$this->model = new StreamNotificationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->streamId, $this->streamId);
parent::update();
}
}