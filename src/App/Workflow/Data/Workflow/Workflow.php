<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class Workflow extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $processId;

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

/**
* @var \Nemundo\Workflow\App\Identification\Model\Identification
*/
public $assignment;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
$this->assignment = new \Nemundo\Workflow\App\Identification\Model\Identification();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->number, $this->number);
$this->typeValueList->setModelValue($this->model->workflowNumber, $this->workflowNumber);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->draft, $this->draft);
$this->typeValueList->setModelValue($this->model->closed, $this->closed);
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$property = new \Nemundo\Workflow\App\Identification\Model\IdentificationDataProperty($this->model->assignment, $this->typeValueList);
$property->setValue($this->assignment);
$id = parent::save();
return $id;
}
}