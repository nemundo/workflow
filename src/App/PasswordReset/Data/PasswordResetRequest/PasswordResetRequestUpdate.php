<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\Data\AbstractModelUpdate;
class PasswordResetRequestUpdate extends AbstractModelUpdate {
/**
* @var PasswordResetRequestModel
*/
public $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $login;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->login, $this->login);
parent::update();
}
}