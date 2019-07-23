<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $pageId;

/**
* @var \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageExternalType
*/
public $page;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $delete;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $itemOrder;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WikiContentModel::class;
$this->externalTableName = "wiki_wiki_content";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->pageId = new \Nemundo\Model\Type\Id\IdType();
$this->pageId->fieldName = "page";
$this->pageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->pageId->aliasFieldName = $this->pageId->tableName ."_".$this->pageId->fieldName;
$this->pageId->label = "Page";
$this->addType($this->pageId);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->delete = new \Nemundo\Model\Type\Number\YesNoType();
$this->delete->fieldName = "delete";
$this->delete->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->delete->aliasFieldName = $this->delete->tableName . "_" . $this->delete->fieldName;
$this->delete->label = "Delete";
$this->addType($this->delete);

$this->itemOrder = new \Nemundo\Model\Type\Number\YesNoType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

}
public function loadPage() {
if ($this->page == null) {
$this->page = new \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageExternalType(null, $this->parentFieldName . "_page");
$this->page->fieldName = "page";
$this->page->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->page->aliasFieldName = $this->page->tableName ."_".$this->page->fieldName;
$this->page->label = "Page";
$this->addType($this->page);
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName ."_".$this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);
}
return $this;
}
}