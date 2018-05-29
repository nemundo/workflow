<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
class DeadlineChangeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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