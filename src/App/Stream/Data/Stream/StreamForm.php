<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}