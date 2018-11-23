<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $userConfig;

protected function loadModel() {
$this->tableName = "userconfig_userconfig";
$this->aliasTableName = "userconfig_userconfig";
$this->label = "UserConfig";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "userconfig_userconfig";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "userconfig_userconfig_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userConfig = new \Nemundo\Model\Type\Text\TextType($this);
$this->userConfig->tableName = "userconfig_userconfig";
$this->userConfig->fieldName = "user_config";
$this->userConfig->aliasFieldName = "userconfig_userconfig_user_config";
$this->userConfig->label = "User Config";
$this->userConfig->allowNullValue = "";
$this->userConfig->length = 255;

}
}