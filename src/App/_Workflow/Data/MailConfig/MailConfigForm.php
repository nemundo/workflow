<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
class MailConfigForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
$this->model = new MailConfigModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}