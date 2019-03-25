<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueId extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserConfigUniqueIdModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$id = parent::save();
return $id;
}
}
