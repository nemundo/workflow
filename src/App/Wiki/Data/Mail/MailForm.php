<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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