<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserConfigNumberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
}
