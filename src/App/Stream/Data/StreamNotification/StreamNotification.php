<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotification extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamNotificationModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->streamId, $this->streamId);
$id = parent::save();
return $id;
}
}