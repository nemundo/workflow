<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentExternalType extends \Nemundo\Model\Type\External\ExternalType
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\File\FileType
     */
    public $document;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = MessageDocumentModel::class;
        $this->externalTableName = "message_message_document";
        $this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id = new \Nemundo\Model\Type\Id\IdType();
        $this->id->fieldName = "id";
        $this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
        $this->id->label = "Id";
        $this->addType($this->id);

        $this->document = new \Nemundo\Model\Type\File\FileType();
        $this->document->fieldName = "document";
        $this->document->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->document->aliasFieldName = $this->document->tableName . "_" . $this->document->fieldName;
        $this->document->label = "Document";
        $this->addType($this->document);

    }
}