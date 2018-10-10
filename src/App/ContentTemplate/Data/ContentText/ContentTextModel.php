<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

protected function loadModel() {
$this->tableName = "content_template_content_text";
$this->aliasTableName = "content_template_content_text";
$this->label = "Content Text";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_content_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_content_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "content_template_content_text";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "content_template_content_text_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";
$this->text->length = 255;

}
}