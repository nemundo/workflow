<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
use Nemundo\Model\Form\ModelFormUpdate;
class MessageToFormUpdate extends ModelFormUpdate {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageToModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}