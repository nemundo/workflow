<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequest extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PasswordResetRequestModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->login, $this->login);
$id = parent::save();
return $id;
}
}