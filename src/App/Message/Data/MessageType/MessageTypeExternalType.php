<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeExternalType extends \Nemundo\Model\Type\External\ExternalType
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\Text\TextType
     */
    public $messageType;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = MessageTypeModel::class;
        $this->externalTableName = "message_message_type";
        $this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id = new \Nemundo\Model\Type\Id\IdType();
        $this->id->fieldName = "id";
        $this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
        $this->id->label = "Id";
        $this->addType($this->id);

        $this->messageType = new \Nemundo\Model\Type\Text\TextType();
        $this->messageType->fieldName = "message_type";
        $this->messageType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->messageType->aliasFieldName = $this->messageType->tableName . "_" . $this->messageType->fieldName;
        $this->messageType->label = "Message Type";
        $this->addType($this->messageType);

    }
}