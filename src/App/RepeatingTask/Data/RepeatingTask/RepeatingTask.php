<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTask extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RepeatingTaskModel
*/
protected $model;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $task;

/**
* @var int
*/
public $deadlineDay;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$this->typeValueList->setModelValue($this->model->deadlineDay, $this->deadlineDay);
$id = parent::save();
return $id;
}
}