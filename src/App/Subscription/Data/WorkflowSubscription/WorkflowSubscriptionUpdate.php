<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowSubscriptionUpdate extends AbstractModelUpdate {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}