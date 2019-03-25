<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
}
