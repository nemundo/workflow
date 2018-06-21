<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\Data\AbstractModelUpdate;
class TeamUserUpdate extends AbstractModelUpdate {
/**
* @var TeamUserModel
*/
public $model;

/**
* @var string
*/
public $teamUserId;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->teamUserId, $this->teamUserId);
parent::update();
}
}