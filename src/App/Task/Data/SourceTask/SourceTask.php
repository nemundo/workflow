<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTask extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SourceTaskModel
*/
protected $model;

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
* @var string
*/
public $responsibleUserId;

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

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->responsibleUserId, $this->responsibleUserId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$value = (new \Nemundo\Core\Type\Text\Text($this->timeEffort))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->timeEffort, $value);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$id = parent::save();
return $id;
}
}