<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentModel();
$this->label = $this->model->label;
}
}