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

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->usergroupId, $this->usergroupId);
parent::update();
}
}