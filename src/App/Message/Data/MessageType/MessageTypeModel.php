<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $messageType;

protected function loadModel() {
$this->tableName = "message_message_type";
$this->aliasTableName = "message_message_type";
$this->label = "Message Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "message_message_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "message_message_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->messageType = new \Nemundo\Model\Type\Text\TextType($this);
$this->messageType->tableName = "message_message_type";
$this->messageType->fieldName = "message_type";
$this->messageType->aliasFieldName = "message_message_type_message_type";
$this->messageType->label = "Message Type";
$this->messageType->allowNullValue = "";
$this->messageType->length = 255;

}
}