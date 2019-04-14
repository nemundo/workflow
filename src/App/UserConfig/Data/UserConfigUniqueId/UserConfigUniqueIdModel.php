<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userConfigId;

/**
* @var \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigExternalType
*/
public $userConfig;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $value;

protected function loadModel() {
$this->tableName = "userconfig_unique_id";
$this->aliasTableName = "userconfig_unique_id";
$this->label = "User Config Unique Id";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "userconfig_unique_id";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "userconfig_unique_id_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "userconfig_unique_id";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "userconfig_unique_id_user";
$this->userId->label = "User";

$this->userConfigId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userConfigId->tableName = "userconfig_unique_id";
$this->userConfigId->fieldName = "user_config";
$this->userConfigId->aliasFieldName = "userconfig_unique_id_user_config";
$this->userConfigId->label = "User Config";

$this->value = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->value->tableName = "userconfig_unique_id";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "userconfig_unique_id_value";
$this->value->label = "Value";
$this->value->allowNullValue = "";
$this->value->visible->form = false;
$this->value->visible->table = false;
$this->value->visible->view = false;
$this->id->visible->form = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "userconfig_unique_id_user");
$this->user->tableName = "userconfig_unique_id";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "userconfig_unique_id_user";
$this->user->label = "User";
}
return $this;
}
public function loadUserConfig() {
if ($this->userConfig == null) {
$this->userConfig = new \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigExternalType($this, "userconfig_unique_id_user_config");
$this->userConfig->tableName = "userconfig_unique_id";
$this->userConfig->fieldName = "user_config";
$this->userConfig->aliasFieldName = "userconfig_unique_id_user_config";
$this->userConfig->label = "User Config";
}
return $this;
}
}