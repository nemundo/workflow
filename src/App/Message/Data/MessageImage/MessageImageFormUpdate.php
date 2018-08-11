<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageImageFormUpdate extends ModelFormUpdate {
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