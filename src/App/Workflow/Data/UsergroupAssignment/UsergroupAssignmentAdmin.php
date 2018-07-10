<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UsergroupAssignmentModel();
}
}