<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UserConfigModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userConfig;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->userConfig, $this->userConfig);
$id = parent::save();
return $id;
}
}