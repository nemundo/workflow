<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}