<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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