<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageDocumentFormUpdate extends ModelFormUpdate {
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