<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
}