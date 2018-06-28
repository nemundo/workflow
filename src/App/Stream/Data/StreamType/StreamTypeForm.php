<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}