<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
class WorkflowStatus extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowStatusModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $workflowStatus;

/**
* @var string
*/
public $workflowStatusClass;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->workflowStatus, $this->workflowStatus);
$this->typeValueList->setModelValue($this->model->workflowStatusClass, $this->workflowStatusClass);
$id = parent::save();
return $id;
}
}