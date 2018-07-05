<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadModel() {
$this->tableName = "message_text";
$this->aliasTableName = "message_text";
$this->label = "Message Text";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "message_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "message_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "message_text";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "message_text_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";

}
}