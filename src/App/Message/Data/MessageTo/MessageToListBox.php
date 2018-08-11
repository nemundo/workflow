<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageToModel();
$this->label = $this->model->label;
}
}