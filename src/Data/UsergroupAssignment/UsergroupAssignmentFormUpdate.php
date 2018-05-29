<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\Form\ModelFormUpdate;
class UsergroupAssignmentFormUpdate extends ModelFormUpdate {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UsergroupAssignmentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}