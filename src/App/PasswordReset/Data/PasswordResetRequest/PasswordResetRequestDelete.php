<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PasswordResetRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
}