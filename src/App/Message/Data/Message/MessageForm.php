<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}