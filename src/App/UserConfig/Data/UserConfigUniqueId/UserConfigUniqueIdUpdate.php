<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserConfigUniqueIdUpdate extends AbstractModelUpdate {
/**
* @var UserConfigUniqueIdModel
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
* @var string
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}
