<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserConfigNumberUpdate extends AbstractModelUpdate {
/**
* @var UserConfigNumberModel
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
* @var int
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}