<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\View\ModelView;
class PasswordResetRequestView extends ModelView {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PasswordResetRequestModel();
}
}