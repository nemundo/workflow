<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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