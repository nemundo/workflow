<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceTaskUpdate extends AbstractModelUpdate {
/**
* @var SourceTaskModel
*/
public $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $task;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var float
*/
public $timeEffort;

/**
* @var string
*/
public $source;

/**
* @var bool
*/
public $done;

/**
* @var \Nemundo\Workflow\App\Identification\Model\Identification
*/
public $assignment;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
$this->assignment = new \Nemundo\Workflow\App\Identification\Model\Identification();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$value = (new \Nemundo\Core\Type\Text\Text($this->timeEffort))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->timeEffort, $value);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$property = new \Nemundo\Workflow\App\Identification\Model\IdentificationDataProperty($this->model->assignment, $this->typeValueList);
$property->setValue($this->assignment);
parent::update();
}
}