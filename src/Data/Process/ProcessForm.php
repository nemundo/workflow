<?php
namespace Nemundo\Workflow\Data\Process;
class ProcessForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}