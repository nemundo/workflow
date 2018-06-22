<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PasswordResetRequestModel();
}
}