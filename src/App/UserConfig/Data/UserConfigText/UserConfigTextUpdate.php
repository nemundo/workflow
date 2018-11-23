<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserConfigTextUpdate extends AbstractModelUpdate {
/**
* @var UserConfigTextModel
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
$this->model = new UserConfigTextModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}