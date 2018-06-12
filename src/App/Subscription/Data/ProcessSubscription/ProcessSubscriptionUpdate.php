<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\Data\AbstractModelUpdate;
class ProcessSubscriptionUpdate extends AbstractModelUpdate {
/**
* @var ProcessSubscriptionModel
*/
public $model;

/**
* @var string
*/
public $processId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new ProcessSubscriptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}