<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $wordId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType
*/
public $word;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

protected function loadModel() {
$this->tableName = "searchengine_search_index";
$this->aliasTableName = "searchengine_search_index";
$this->label = "Search Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "searchengine_search_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "searchengine_search_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "searchengine_search_index";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "searchengine_search_index_content_type";
$this->contentTypeId->label = "Content Type";

$this->wordId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->wordId->tableName = "searchengine_search_index";
$this->wordId->fieldName = "word";
$this->wordId->aliasFieldName = "searchengine_search_index_word";
$this->wordId->label = "Word";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "searchengine_search_index";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "searchengine_search_index_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->wordId);
$index->addType($this->dataId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType($this, "searchengine_search_index_content_type");
$this->contentType->tableName = "searchengine_search_index";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "searchengine_search_index_content_type";
$this->contentType->label = "Content Type";
}
}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType($this, "searchengine_search_index_word");
$this->word->tableName = "searchengine_search_index";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "searchengine_search_index_word";
$this->word->label = "Word";
}
}
}