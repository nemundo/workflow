<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageTextFormUpdate extends ModelFormUpdate {
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