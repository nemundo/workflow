<?php
namespace Nemundo\Workflow\Data\UserAssignment;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserAssignmentUpdate extends AbstractModelUpdate {
/**
* @var UserAssignmentModel
*/
public $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $userId;

/**
* @var bool
*/
public $delete;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
parent::update();
}
}