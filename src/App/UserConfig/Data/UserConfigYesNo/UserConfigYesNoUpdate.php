<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserConfigYesNoUpdate extends AbstractModelUpdate {
/**
* @var UserConfigYesNoModel
*/
public $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $userConfigId;

/**
* @var bool
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}