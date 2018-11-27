<?php

namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
class MailConfigExternalType extends \Nemundo\Model\Type\External\ExternalType
{
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
    public $notificationMail;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = MailConfigModel::class;
        $this->externalTableName = "workflow_mail_config";
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
        $this->userId->aliasFieldName = $this->userId->tableName . "_" . $this->userId->fieldName;
        $this->userId->label = "User";
        $this->addType($this->userId);

        $this->assignmentMail = new \Nemundo\Model\Type\Number\YesNoType();
        $this->assignmentMail->fieldName = "assignment_mail";
        $this->assignmentMail->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->assignmentMail->aliasFieldName = $this->assignmentMail->tableName . "_" . $this->assignmentMail->fieldName;
        $this->assignmentMail->label = "eMail bei Zuweisung";
        $this->addType($this->assignmentMail);

        $this->notificationMail = new \Nemundo\Model\Type\Number\YesNoType();
        $this->notificationMail->fieldName = "notification_mail";
        $this->notificationMail->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->notificationMail->aliasFieldName = $this->notificationMail->tableName . "_" . $this->notificationMail->fieldName;
        $this->notificationMail->label = "eMail bei Benachrichtigungen";
        $this->addType($this->notificationMail);

    }

    public function loadUser()
    {
        if ($this->user == null) {
            $this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
            $this->user->fieldName = "user";
            $this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->user->aliasFieldName = $this->user->tableName . "_" . $this->user->fieldName;
            $this->user->label = "User";
            $this->addType($this->user);
        }
        return $this;
    }
}