<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\Id\AbstractModelIdValue;
class TeamUserId extends AbstractModelIdValue {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
}