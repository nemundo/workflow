<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserAssignmentChangeModel();
$this->label = $this->model->label;
}
}