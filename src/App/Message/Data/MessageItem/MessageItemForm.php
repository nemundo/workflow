<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageItemModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageItemModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}