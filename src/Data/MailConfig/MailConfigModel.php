<?php
namespace Nemundo\Workflow\Data\MailConfig;
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
public $notificationMail;

protected function loadModel() {
$this->tableName = "workflow_mail_config";
$this->aliasTableName = "workflow_mail_config";
$this->label = "Mail Config";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_mail_config";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_mail_config_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_mail_config";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_mail_config_user";
$this->userId->label = "User";

$this->assignmentMail = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->assignmentMail->tableName = "workflow_mail_config";
$this->assignmentMail->fieldName = "assignment_mail";
$this->assignmentMail->aliasFieldName = "workflow_mail_config_assignment_mail";
$this->assignmentMail->label = "eMail bei Zuweisung";
$this->assignmentMail->allowNullValue = "";

$this->notificationMail = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->notificationMail->tableName = "workflow_mail_config";
$this->notificationMail->fieldName = "notification_mail";
$this->notificationMail->aliasFieldName = "workflow_mail_config_notification_mail";
$this->notificationMail->label = "eMail bei Benachrichtigungen";
$this->notificationMail->allowNullValue = "";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_mail_config_user");
$this->user->tableName = "workflow_mail_config";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_mail_config_user";
$this->user->label = "User";
}
}
}