<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserConfigUpdate extends AbstractModelUpdate {
/**
* @var UserConfigModel
*/
public $model;

/**
* @var string
*/
public $userConfig;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userConfig, $this->userConfig);
parent::update();
}
}