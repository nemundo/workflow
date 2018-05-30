<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
class UserAssignmentChange extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserAssignmentChangeModel
*/
protected $model;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}