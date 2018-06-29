<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class Task extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TaskModel
*/
protected $model;

/**
* @var string
*/
public $task;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var bool
*/
public $archive;

/**
* @var string
*/
public $identificationTypeId;

/**
* @var string
*/
public $identificationId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

/**
* @var float
*/
public $timeEffort;

public function __construct() {
parent::__construct();
$this->model = new TaskModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->task, $this->task);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->archive, $this->archive);
$this->typeValueList->setModelValue($this->model->identificationTypeId, $this->identificationTypeId);
$this->typeValueList->setModelValue($this->model->identificationId, $this->identificationId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$value = (new \Nemundo\Core\Type\Text\Text($this->timeEffort))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->timeEffort, $value);
$id = parent::save();
return $id;
}
}