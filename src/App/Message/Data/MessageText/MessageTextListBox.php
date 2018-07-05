<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageTextModel();
$this->label = $this->model->label;
}
}