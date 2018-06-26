<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\Data\AbstractModelUpdate;
class UsergroupAssignmentUpdate extends AbstractModelUpdate {
/**
* @var UsergroupAssignmentModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->usergroupId, $this->usergroupId);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
parent::update();
}
}