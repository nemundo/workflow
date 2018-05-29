<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusChangeModel();
$this->label = $this->model->label;
}
}