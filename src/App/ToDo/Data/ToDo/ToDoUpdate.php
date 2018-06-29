<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Model\Data\AbstractModelUpdate;
class ToDoUpdate extends AbstractModelUpdate {
/**
* @var ToDoModel
*/
public $model;

/**
* @var string
*/
public $todo;

/**
* @var bool
*/
public $done;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->todo, $this->todo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
parent::update();
}
}