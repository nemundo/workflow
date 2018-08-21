<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\Data\AbstractModelUpdate;
class RepeatingTaskUpdate extends AbstractModelUpdate {
/**
* @var RepeatingTaskModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$this->typeValueList->setModelValue($this->model->deadlineDay, $this->deadlineDay);
parent::update();
}
}