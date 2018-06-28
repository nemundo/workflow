<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $group;

protected function loadModel() {
$this->tableName = "stream_stream_group";
$this->aliasTableName = "stream_stream_group";
$this->label = "Stream Group";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "stream_stream_group";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "stream_stream_group_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->group = new \Nemundo\Model\Type\Text\TextType($this);
$this->group->tableName = "stream_stream_group";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "stream_stream_group_group";
$this->group->label = "Group";
$this->group->allowNullValue = "";
$this->group->length = 255;

}
}