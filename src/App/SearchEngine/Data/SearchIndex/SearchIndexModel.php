<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $documentId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentExternalType
*/
public $document;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $wordId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType
*/
public $word;

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

$this->documentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->documentId->tableName = "searchengine_search_index";
$this->documentId->fieldName = "document";
$this->documentId->aliasFieldName = "searchengine_search_index_document";
$this->documentId->label = "Document";
$this->loadDocument();

$this->wordId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->wordId->tableName = "searchengine_search_index";
$this->wordId->fieldName = "word";
$this->wordId->aliasFieldName = "searchengine_search_index_word";
$this->wordId->label = "Word";

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->wordId);
$index->addType($this->documentId);

}
public function loadDocument() {
if ($this->document == null) {
$this->document = new \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentExternalType($this, "searchengine_search_index_document");
$this->document->tableName = "searchengine_search_index";
$this->document->fieldName = "document";
$this->document->aliasFieldName = "searchengine_search_index_document";
$this->document->label = "Document";
}
return $this;
}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType($this, "searchengine_search_index_word");
$this->word->tableName = "searchengine_search_index";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "searchengine_search_index_word";
$this->word->label = "Word";
}
return $this;
}
}