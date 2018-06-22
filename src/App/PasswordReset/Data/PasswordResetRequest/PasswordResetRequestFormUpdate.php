<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\Form\ModelFormUpdate;
class PasswordResetRequestFormUpdate extends ModelFormUpdate {
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