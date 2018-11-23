<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
}