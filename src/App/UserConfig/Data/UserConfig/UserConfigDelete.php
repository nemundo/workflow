<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
}