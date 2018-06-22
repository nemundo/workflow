<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestModel extends \Nemundo\Workflow\Model\AbstractWorkflowBaseModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $login;

protected function loadModel() {
$this->tableName = "password_reset_password_reset_request";
$this->aliasTableName = "password_reset_password_reset_request";
$this->label = "PasswordResetRequest";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "password_reset_password_reset_request";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "password_reset_password_reset_request_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;


$this->login = new \Nemundo\Model\Type\Text\TextType($this);
$this->login->tableName = "password_reset_password_reset_request";
$this->login->fieldName = "login";
$this->login->aliasFieldName = "password_reset_password_reset_request_login";
$this->login->label = "Login";
$this->login->validation = true;
$this->login->allowNullValue = "";
$this->login->length = 255;

}
}