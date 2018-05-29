<?php
namespace Nemundo\Workflow\Data\Workflow;
class Workflow extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowModel
*/
protected $model;

/**
* @var int
*/
public $number;

/**
* @var string
*/
public $workflowNumber;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $processId;

/**
* @var string
*/
public $dataId;

/**
* @var bool
*/
public $draft;

/**
* @var bool
*/
public $closed;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->number, $this->number);
$this->typeValueList->setModelValue($this->model->workflowNumber, $this->workflowNumber);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->draft, $this->draft);
$this->typeValueList->setModelValue($this->model->closed, $this->closed);
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$id = parent::save();
return $id;
}
}