<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowStatusChangeUpdate extends AbstractModelUpdate {
/**
* @var WorkflowStatusChangeModel
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
$this->model = new WorkflowStatusChangeModel();
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