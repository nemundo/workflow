<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $teamUserId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $teamUser;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = TeamUserModel::class;
$this->externalTableName = "team_inbox_team_user";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->teamUserId = new \Nemundo\Model\Type\Id\IdType();
$this->teamUserId->fieldName = "team_user";
$this->teamUserId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->teamUserId->aliasFieldName = $this->teamUserId->tableName ."_".$this->teamUserId->fieldName;
$this->teamUserId->label = "Team User";
$this->addType($this->teamUserId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadTeamUser() {
if ($this->teamUser == null) {
$this->teamUser = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_team_user");
$this->teamUser->fieldName = "team_user";
$this->teamUser->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->teamUser->aliasFieldName = $this->teamUser->tableName ."_".$this->teamUser->fieldName;
$this->teamUser->label = "Team User";
$this->addType($this->teamUser);
}
return $this;
}
}