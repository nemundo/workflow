<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new PersonalTaskModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}