<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageDocumentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}