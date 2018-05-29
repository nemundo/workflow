<?php
namespace Nemundo\Workflow\Data\SubjectChange;
class SubjectChangeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new SubjectChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}