<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentChangeModel();
$this->label = $this->model->label;
}
}