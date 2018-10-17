<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
use Nemundo\Model\Form\ModelFormUpdate;
class InboxFormUpdate extends ModelFormUpdate {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
$this->model = new InboxModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}