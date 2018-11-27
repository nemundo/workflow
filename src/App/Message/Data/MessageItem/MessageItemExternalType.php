<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemExternalType extends \Nemundo\Model\Type\External\ExternalType
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $messageId;

    /**
     * @var \Nemundo\Workflow\App\Message\Data\Message\MessageExternalType
     */
    public $message;

    /**
     * @var \Nemundo\Model\Type\User\CreatedUserType
     */
    public $userCreatedId;

    /**
     * @var \Nemundo\User\Data\User\UserExternalType
     */
    public $userCreated;

    /**
     * @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
     */
    public $dateTimeCreated;

    /**
     * @var \Nemundo\Model\Type\Id\UniqueIdType
     */
    public $dataId;

    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $contentTypeId;

    /**
     * @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
     */
    public $contentType;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = MessageItemModel::class;
        $this->externalTableName = "message_item";
        $this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id = new \Nemundo\Model\Type\Id\IdType();
        $this->id->fieldName = "id";
        $this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
        $this->id->label = "Id";
        $this->addType($this->id);

        $this->messageId = new \Nemundo\Model\Type\Id\IdType();
        $this->messageId->fieldName = "message";
        $this->messageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->messageId->aliasFieldName = $this->messageId->tableName . "_" . $this->messageId->fieldName;
        $this->messageId->label = "Message";
        $this->addType($this->messageId);

        $this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType();
        $this->userCreatedId->fieldName = "user_created";
        $this->userCreatedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->userCreatedId->aliasFieldName = $this->userCreatedId->tableName . "_" . $this->userCreatedId->fieldName;
        $this->userCreatedId->label = "User Created";
        $this->addType($this->userCreatedId);

        $this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
        $this->dateTimeCreated->fieldName = "date_time_created";
        $this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
        $this->dateTimeCreated->label = "Date Time Created";
        $this->addType($this->dateTimeCreated);

        $this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
        $this->dataId->fieldName = "data_id";
        $this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
        $this->dataId->label = "Data Id";
        $this->addType($this->dataId);

        $this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
        $this->contentTypeId->fieldName = "content_type";
        $this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName . "_" . $this->contentTypeId->fieldName;
        $this->contentTypeId->label = "Content Type";
        $this->addType($this->contentTypeId);

    }

    public function loadMessage()
    {
        if ($this->message == null) {
            $this->message = new \Nemundo\Workflow\App\Message\Data\Message\MessageExternalType(null, $this->parentFieldName . "_message");
            $this->message->fieldName = "message";
            $this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
            $this->message->label = "Message";
            $this->addType($this->message);
        }
        return $this;
    }

    public function loadUserCreated()
    {
        if ($this->userCreated == null) {
            $this->userCreated = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_created");
            $this->userCreated->fieldName = "user_created";
            $this->userCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->userCreated->aliasFieldName = $this->userCreated->tableName . "_" . $this->userCreated->fieldName;
            $this->userCreated->label = "User Created";
            $this->addType($this->userCreated);
        }
        return $this;
    }

    public function loadContentType()
    {
        if ($this->contentType == null) {
            $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
            $this->contentType->fieldName = "content_type";
            $this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
            $this->contentType->aliasFieldName = $this->contentType->tableName . "_" . $this->contentType->fieldName;
            $this->contentType->label = "Content Type";
            $this->addType($this->contentType);
        }
        return $this;
    }
}