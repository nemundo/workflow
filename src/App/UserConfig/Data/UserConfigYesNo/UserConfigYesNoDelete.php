<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
class UserConfigYesNoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserConfigYesNoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
}