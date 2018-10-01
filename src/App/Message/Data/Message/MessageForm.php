<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageModel();
}
}