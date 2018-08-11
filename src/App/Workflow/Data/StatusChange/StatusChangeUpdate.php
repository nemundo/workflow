<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class StatusChangeUpdate extends AbstractModelUpdate {
/**
* @var StatusChangeModel
*/
public $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var string
*/
public $workflowItemId;

/**
* @var bool
*/
public $draft;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$this->typeValueList->setModelValue($this->model->workflowItemId, $this->workflowItemId);
$this->typeValueList->setModelValue($this->model->draft, $this->draft);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}