<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageImageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}