<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageImageModel();
$this->label = $this->model->label;
}
}