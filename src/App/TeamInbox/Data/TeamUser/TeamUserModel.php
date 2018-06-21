<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $teamUserId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $teamUser;

protected function loadModel() {
$this->tableName = "team_inbox_team_user";
$this->aliasTableName = "team_inbox_team_user";
$this->label = "Team User";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "team_inbox_team_user";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "team_inbox_team_user_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "team_inbox_team_user";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "team_inbox_team_user_user";
$this->userId->label = "User";

$this->teamUserId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->teamUserId->tableName = "team_inbox_team_user";
$this->teamUserId->fieldName = "team_user";
$this->teamUserId->aliasFieldName = "team_inbox_team_user_team_user";
$this->teamUserId->label = "Team User";
$this->loadTeamUser();

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "team_inbox_team_user_user");
$this->user->tableName = "team_inbox_team_user";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "team_inbox_team_user_user";
$this->user->label = "User";
$this->user->visible->form = false;
}
}
public function loadTeamUser() {
if ($this->teamUser == null) {
$this->teamUser = new \Nemundo\User\Data\User\UserExternalType($this, "team_inbox_team_user_team_user");
$this->teamUser->tableName = "team_inbox_team_user";
$this->teamUser->fieldName = "team_user";
$this->teamUser->aliasFieldName = "team_inbox_team_user_team_user";
$this->teamUser->label = "Team User";
}
}
}