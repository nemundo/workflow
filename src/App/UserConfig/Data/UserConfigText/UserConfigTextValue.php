<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserConfigTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigTextModel();
}
}