<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
class UserAssignmentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UserAssignmentModel();
}
}