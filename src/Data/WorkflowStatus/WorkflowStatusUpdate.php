<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowStatusUpdate extends AbstractModelUpdate {
/**
* @var WorkflowStatusModel
*/
public $model;

/**
* @var string
*/
public $workflowStatus;

/**
* @var string
*/
public $workflowStatusClass;

/**
* @var string
*/
public $workflowStatusText;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowStatus, $this->workflowStatus);
$this->typeValueList->setModelValue($this->model->workflowStatusClass, $this->workflowStatusClass);
$this->typeValueList->setModelValue($this->model->workflowStatusText, $this->workflowStatusText);
parent::update();
}
}