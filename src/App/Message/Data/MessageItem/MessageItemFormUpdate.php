<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageItemFormUpdate extends ModelFormUpdate {
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