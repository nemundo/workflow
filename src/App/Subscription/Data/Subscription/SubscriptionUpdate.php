<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Model\Data\AbstractModelUpdate;
class SubscriptionUpdate extends AbstractModelUpdate {
/**
* @var SubscriptionModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

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
$this->model = new SubscriptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}