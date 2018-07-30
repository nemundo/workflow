<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PasswordResetRequestModel();
$this->label = $this->model->label;
}
}