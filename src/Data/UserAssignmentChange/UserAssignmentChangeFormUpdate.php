<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
use Nemundo\Model\Form\ModelFormUpdate;
class UserAssignmentChangeFormUpdate extends ModelFormUpdate {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}