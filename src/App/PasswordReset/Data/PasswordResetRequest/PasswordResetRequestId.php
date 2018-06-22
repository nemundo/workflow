<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\Id\AbstractModelIdValue;
class PasswordResetRequestId extends AbstractModelIdValue {
/**
* @var PasswordResetRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
}