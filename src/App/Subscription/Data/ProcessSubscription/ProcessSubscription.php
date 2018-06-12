<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscription extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ProcessSubscriptionModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}