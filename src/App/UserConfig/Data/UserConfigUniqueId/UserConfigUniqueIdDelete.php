<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
}