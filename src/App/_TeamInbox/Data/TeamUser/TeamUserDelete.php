<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
}