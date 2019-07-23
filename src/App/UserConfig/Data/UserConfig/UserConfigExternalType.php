<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $userConfig;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = UserConfigModel::class;
$this->externalTableName = "userconfig_userconfig";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userConfig = new \Nemundo\Model\Type\Text\TextType();
$this->userConfig->fieldName = "user_config";
$this->userConfig->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userConfig->aliasFieldName = $this->userConfig->tableName . "_" . $this->userConfig->fieldName;
$this->userConfig->label = "User Config";
$this->addType($this->userConfig);

}
}