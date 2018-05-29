<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\View\ModelView;
class UsergroupAssignmentView extends ModelView {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UsergroupAssignmentModel();
}
}