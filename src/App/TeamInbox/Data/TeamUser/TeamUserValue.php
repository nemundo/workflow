<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
}