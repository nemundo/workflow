<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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

protected function loadModel() {
$this->tableName = "searchengine_document";
$this->aliasTableName = "searchengine_document";
$this->label = "Document";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "searchengine_document";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "searchengine_document_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "searchengine_document";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "searchengine_document_content_type";
$this->contentTypeId->label = "Content Type";
$this->loadContentType();

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "searchengine_document";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "searchengine_document_data_id";
$this->dataId->label = "DataId";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "searchengine_document_content_type");
$this->contentType->tableName = "searchengine_document";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "searchengine_document_content_type";
$this->contentType->label = "Content Type";
}
}
}