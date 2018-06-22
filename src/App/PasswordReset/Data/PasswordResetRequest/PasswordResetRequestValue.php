<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PasswordResetRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
}