<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageTextModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}