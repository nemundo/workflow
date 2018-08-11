<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new DeadlineChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}