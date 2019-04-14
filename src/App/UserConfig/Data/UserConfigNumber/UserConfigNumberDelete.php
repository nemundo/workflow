<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserConfigNumberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
}