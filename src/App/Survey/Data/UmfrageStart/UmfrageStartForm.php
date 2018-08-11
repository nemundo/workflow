<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
$this->model = new UmfrageStartModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}