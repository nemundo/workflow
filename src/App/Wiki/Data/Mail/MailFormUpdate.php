<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Model\Form\ModelFormUpdate;
class MailFormUpdate extends ModelFormUpdate {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
$this->model = new MailModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}