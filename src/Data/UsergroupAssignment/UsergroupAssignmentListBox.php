<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UsergroupAssignmentModel();
$this->label = $this->model->label;
}
}