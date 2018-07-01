<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTask extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PersonalTaskModel
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
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $responsibleUserId;

/**
* @var float
*/
public $timeEffort;

/**
* @var bool
*/
public $done;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->responsibleUserId, $this->responsibleUserId);
$value = (new \Nemundo\Core\Type\Text\Text($this->timeEffort))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->timeEffort, $value);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$id = parent::save();
return $id;
}
}