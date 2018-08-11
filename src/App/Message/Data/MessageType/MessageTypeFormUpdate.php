<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageTypeFormUpdate extends ModelFormUpdate {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}