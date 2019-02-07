<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UserConfigNumberModel
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
* @var int
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->userConfigId, $this->userConfigId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$id = parent::save();
return $id;
}
}
