<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChange extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowStatusChangeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$this->typeValueList->setModelValue($this->model->workflowItemId, $this->workflowItemId);
$this->typeValueList->setModelValue($this->model->draft, $this->draft);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}