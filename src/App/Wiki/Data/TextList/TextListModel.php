<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListModel extends \Nemundo\App\Content\Model\AbstractDataIdModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

protected function loadModel() {
$this->tableName = "wiki_text_list";
$this->aliasTableName = "wiki_text_list";
$this->label = "Text List";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_text_list";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_text_list_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "wiki_text_list";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "wiki_text_list_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";
$this->text->length = 255;

}
}