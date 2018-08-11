<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadCom() {
$this->model = new PasswordResetRequestModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}