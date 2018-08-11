<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageFormUpdate extends ModelFormUpdate {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}