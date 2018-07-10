<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
use Nemundo\Model\View\ModelView;
class UserAssignmentView extends ModelView {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentModel();
}
}