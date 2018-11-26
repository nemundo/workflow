<?php
namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStoreModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

protected function loadModel() {
$this->tableName = "store_textstore";
$this->aliasTableName = "store_textstore";
$this->label = "TextStore";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "store_textstore";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "store_textstore_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "store_textstore";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "store_textstore_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";
$this->text->length = 255;

}
}