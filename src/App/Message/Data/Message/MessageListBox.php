<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageModel();
$this->label = $this->model->label;
}
}