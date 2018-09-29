<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UserAssignmentChangeModel();
}
}