<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new StatusChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}