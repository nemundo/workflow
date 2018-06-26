<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignment extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UsergroupAssignmentModel
*/
protected $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $usergroupId;

/**
* @var bool
*/
public $delete;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->usergroupId, $this->usergroupId);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
$id = parent::save();
return $id;
}
}