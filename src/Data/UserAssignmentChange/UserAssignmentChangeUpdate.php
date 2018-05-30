<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserAssignmentChangeUpdate extends AbstractModelUpdate {
/**
* @var UserAssignmentChangeModel
*/
public $model;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}