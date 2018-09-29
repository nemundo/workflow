<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserDeadlineAssignmentUpdate extends AbstractModelUpdate {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
parent::update();
}
}