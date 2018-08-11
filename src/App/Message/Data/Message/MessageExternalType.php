<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadType() {
parent::loadType();
$this->externalModelClassName = MessageModel::class;
$this->externalTableName = "message_message";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->count = new \Nemundo\Model\Type\Number\NumberType();
$this->count->fieldName = "count";
$this->count->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->count->aliasFieldName = $this->count->tableName . "_" . $this->count->fieldName;
$this->count->label = "Count";
$this->addType($this->count);

}
}