<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
use Nemundo\Model\Form\ModelFormUpdate;
class UserAssignmentChangeFormUpdate extends ModelFormUpdate {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentChangeModel();
}
}