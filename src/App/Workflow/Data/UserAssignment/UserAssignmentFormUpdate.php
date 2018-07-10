<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
use Nemundo\Model\Form\ModelFormUpdate;
class UserAssignmentFormUpdate extends ModelFormUpdate {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}