<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageToModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}