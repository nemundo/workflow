<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDo extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ToDoModel
*/
protected $model;

/**
* @var string
*/
public $workflowId;

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
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->todo, $this->todo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$id = parent::save();
return $id;
}
}