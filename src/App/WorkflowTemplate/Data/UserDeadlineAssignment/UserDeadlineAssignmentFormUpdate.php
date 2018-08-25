<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\Form\ModelFormUpdate;
class UserDeadlineAssignmentFormUpdate extends ModelFormUpdate {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserDeadlineAssignmentModel();
}
}