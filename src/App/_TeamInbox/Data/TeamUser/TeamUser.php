<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUser extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TeamUserModel
*/
protected $model;

/**
* @var string
*/
public $teamUserId;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->teamUserId, $this->teamUserId);
$id = parent::save();
return $id;
}
}