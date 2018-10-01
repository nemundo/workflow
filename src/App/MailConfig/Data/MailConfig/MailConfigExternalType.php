<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $assignmentMail;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $inboxMail;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = MailConfigModel::class;
$this->externalTableName = "mailconfig_mail_config";
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

$this->assignmentMail = new \Nemundo\Model\Type\Number\YesNoType();
$this->assignmentMail->fieldName = "assignment_mail";
$this->assignmentMail->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->assignmentMail->aliasFieldName = $this->assignmentMail->tableName . "_" . $this->assignmentMail->fieldName;
$this->assignmentMail->label = "Aufgaben Mail";
$this->addType($this->assignmentMail);

$this->inboxMail = new \Nemundo\Model\Type\Number\YesNoType();
$this->inboxMail->fieldName = "inbox_mail";
$this->inboxMail->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->inboxMail->aliasFieldName = $this->inboxMail->tableName . "_" . $this->inboxMail->fieldName;
$this->inboxMail->label = "Benachrichtigung Mail";
$this->addType($this->inboxMail);

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
}