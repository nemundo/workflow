<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
class UserConfigYesNoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserConfigYesNoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
}