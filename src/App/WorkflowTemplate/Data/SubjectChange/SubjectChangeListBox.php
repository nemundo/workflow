<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubjectChangeModel();
$this->label = $this->model->label;
}
}