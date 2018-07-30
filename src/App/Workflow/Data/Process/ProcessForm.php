<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
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