<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadModel() {
$this->tableName = "store_large_text";
$this->aliasTableName = "store_large_text";
$this->label = "LargeTextStore";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "store_large_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "store_large_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "store_large_text";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "store_large_text_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

}
}