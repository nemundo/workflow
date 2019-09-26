<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $value;

protected function loadModel() {
$this->tableName = "userconfig_text";
$this->aliasTableName = "userconfig_text";
$this->label = "UserConfigText";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "userconfig_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "userconfig_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "userconfig_text";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "userconfig_text_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->userConfigId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userConfigId->tableName = "userconfig_text";
$this->userConfigId->fieldName = "user_config";
$this->userConfigId->aliasFieldName = "userconfig_text_user_config";
$this->userConfigId->label = "User Config";
$this->userConfigId->allowNullValue = false;

$this->value = new \Nemundo\Model\Type\Text\TextType($this);
$this->value->tableName = "userconfig_text";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "userconfig_text_value";
$this->value->label = "Value";
$this->value->allowNullValue = false;
$this->value->length = 255;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "userconfig_text_user");
$this->user->tableName = "userconfig_text";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "userconfig_text_user";
$this->user->label = "User";
}
return $this;
}
public function loadUserConfig() {
if ($this->userConfig == null) {
$this->userConfig = new \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigExternalType($this, "userconfig_text_user_config");
$this->userConfig->tableName = "userconfig_text";
$this->userConfig->fieldName = "user_config";
$this->userConfig->aliasFieldName = "userconfig_text_user_config";
$this->userConfig->label = "User Config";
}
return $this;
}
}