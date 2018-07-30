<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowModel();
$this->label = $this->model->label;
}
}