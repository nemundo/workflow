<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\View\ModelView;
class UserDeadlineAssignmentView extends ModelView {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserDeadlineAssignmentModel();
}
}