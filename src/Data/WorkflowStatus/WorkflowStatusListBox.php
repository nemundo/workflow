<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
class WorkflowStatusListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusModel();
$this->label = $this->model->label;
}
}