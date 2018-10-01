<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $assignmentMail;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $inboxMail;

protected function loadModel() {
$this->tableName = "mailconfig_mail_config";
$this->aliasTableName = "mailconfig_mail_config";
$this->label = "MailConfig";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "mailconfig_mail_config";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "mailconfig_mail_config_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "mailconfig_mail_config";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "mailconfig_mail_config_user";
$this->userId->label = "User";

$this->assignmentMail = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->assignmentMail->tableName = "mailconfig_mail_config";
$this->assignmentMail->fieldName = "assignment_mail";
$this->assignmentMail->aliasFieldName = "mailconfig_mail_config_assignment_mail";
$this->assignmentMail->label = "Aufgaben Mail";
$this->assignmentMail->allowNullValue = "";

$this->inboxMail = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->inboxMail->tableName = "mailconfig_mail_config";
$this->inboxMail->fieldName = "inbox_mail";
$this->inboxMail->aliasFieldName = "mailconfig_mail_config_inbox_mail";
$this->inboxMail->label = "Benachrichtigung Mail";
$this->inboxMail->allowNullValue = "";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "mailconfig_mail_config_user");
$this->user->tableName = "mailconfig_mail_config";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "mailconfig_mail_config_user";
$this->user->label = "User";
}
}
}