<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $pageId;

/**
* @var \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageExternalType
*/
public $page;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "wiki_wiki_content";
$this->aliasTableName = "wiki_wiki_content";
$this->label = "Wiki Content";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_wiki_content";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_wiki_content_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->pageId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->pageId->tableName = "wiki_wiki_content";
$this->pageId->fieldName = "page";
$this->pageId->aliasFieldName = "wiki_wiki_content_page";
$this->pageId->label = "Page";

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "wiki_wiki_content";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "wiki_wiki_content_content_type";
$this->contentTypeId->label = "Content Type";
$this->loadContentType();

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "wiki_wiki_content";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "wiki_wiki_content_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->delete = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->delete->tableName = "wiki_wiki_content";
$this->delete->fieldName = "delete";
$this->delete->aliasFieldName = "wiki_wiki_content_delete";
$this->delete->label = "Delete";
$this->delete->allowNullValue = "";

$this->itemOrder = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->itemOrder->tableName = "wiki_wiki_content";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "wiki_wiki_content_item_order";
$this->itemOrder->label = "Item Order";
$this->itemOrder->allowNullValue = "";

}
public function loadPage() {
if ($this->page == null) {
$this->page = new \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageExternalType($this, "wiki_wiki_content_page");
$this->page->tableName = "wiki_wiki_content";
$this->page->fieldName = "page";
$this->page->aliasFieldName = "wiki_wiki_content_page";
$this->page->label = "Page";
}
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "wiki_wiki_content_content_type");
$this->contentType->tableName = "wiki_wiki_content";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "wiki_wiki_content_content_type";
$this->contentType->label = "Content Type";
}
}
}