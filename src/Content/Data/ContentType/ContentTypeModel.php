<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
class ContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $contentTypeClass;

protected function loadModel() {
$this->tableName = "content_content_type";
$this->aliasTableName = "content_content_type";
$this->label = "Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentType = new \Nemundo\Model\Type\Text\TextType($this);
$this->contentType->tableName = "content_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_content_type_content_type";
$this->contentType->label = "Content Type";
$this->contentType->allowNullValue = "";
$this->contentType->length = 255;

$this->contentTypeClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->contentTypeClass->tableName = "content_content_type";
$this->contentTypeClass->fieldName = "content_type_class";
$this->contentTypeClass->aliasFieldName = "content_content_type_content_type_class";
$this->contentTypeClass->label = "Content Type Class";
$this->contentTypeClass->allowNullValue = "";
$this->contentTypeClass->phpClassName = Nemundo\App\Content\Type\AbstractContentType::class;

}
}