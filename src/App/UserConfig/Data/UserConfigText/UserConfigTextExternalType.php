<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserConfigTextModel::class;
$this->externalTableName = "userconfig_userconfigtext";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->userConfigId = new \Nemundo\Model\Type\Id\IdType();
$this->userConfigId->fieldName = "user_config";
$this->userConfigId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userConfigId->aliasFieldName = $this->userConfigId->tableName ."_".$this->userConfigId->fieldName;
$this->userConfigId->label = "User Config";
$this->addType($this->userConfigId);

$this->value = new \Nemundo\Model\Type\Text\TextType();
$this->value->fieldName = "value";
$this->value->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->value->aliasFieldName = $this->value->tableName . "_" . $this->value->fieldName;
$this->value->label = "Value";
$this->addType($this->value);

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
public function loadUserConfig() {
if ($this->userConfig == null) {
$this->userConfig = new \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigExternalType(null, $this->parentFieldName . "_user_config");
$this->userConfig->fieldName = "user_config";
$this->userConfig->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userConfig->aliasFieldName = $this->userConfig->tableName ."_".$this->userConfig->fieldName;
$this->userConfig->label = "User Config";
$this->addType($this->userConfig);
}
return $this;
}
}