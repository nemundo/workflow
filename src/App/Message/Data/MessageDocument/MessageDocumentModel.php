<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $document;

protected function loadModel() {
$this->tableName = "message_message_document";
$this->aliasTableName = "message_message_document";
$this->label = "Message Document";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "message_message_document";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "message_message_document_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->document = new \Nemundo\Model\Type\File\FileType($this);
$this->document->tableName = "message_message_document";
$this->document->fieldName = "document";
$this->document->aliasFieldName = "message_message_document_document";
$this->document->label = "Document";
$this->document->allowNullValue = "";

}
}