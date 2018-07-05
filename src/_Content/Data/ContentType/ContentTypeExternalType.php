<?php
namespace Nemundo\App\Content\Data\ContentType;
class ContentTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadType() {
parent::loadType();
$this->externalModelClassName = ContentTypeModel::class;
$this->externalTableName = "content_content_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentType = new \Nemundo\Model\Type\Text\TextType();
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName . "_" . $this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);

$this->contentTypeClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->contentTypeClass->fieldName = "content_type_class";
$this->contentTypeClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeClass->aliasFieldName = $this->contentTypeClass->tableName . "_" . $this->contentTypeClass->fieldName;
$this->contentTypeClass->label = "Content Type Class";
$this->addType($this->contentTypeClass);

}
}