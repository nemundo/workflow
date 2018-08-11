<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $count;

protected function loadModel() {
$this->tableName = "message_message";
$this->aliasTableName = "message_message";
$this->label = "Message";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "message_message";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "message_message_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "message_message";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "message_message_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = "";
$this->subject->length = 255;

$this->count = new \Nemundo\Model\Type\Number\NumberType($this);
$this->count->tableName = "message_message";
$this->count->fieldName = "count";
$this->count->aliasFieldName = "message_message_count";
$this->count->label = "Count";
$this->count->allowNullValue = "";

}
}