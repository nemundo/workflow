<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscription extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowSubscriptionModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}