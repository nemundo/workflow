<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class PasswordResetRequestTable extends BootstrapModelTable {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadCom() {
$this->model = new PasswordResetRequestModel();
}
}