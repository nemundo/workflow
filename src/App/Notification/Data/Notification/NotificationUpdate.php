<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Model\Data\AbstractModelUpdate;
class NotificationUpdate extends AbstractModelUpdate {
/**
* @var NotificationModel
*/
public $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}