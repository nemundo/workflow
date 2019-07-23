<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $documentId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentExternalType
*/
public $document;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $wordId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType
*/
public $word;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = SearchIndexModel::class;
$this->externalTableName = "searchengine_search_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->documentId = new \Nemundo\Model\Type\Id\IdType();
$this->documentId->fieldName = "document";
$this->documentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->documentId->aliasFieldName = $this->documentId->tableName ."_".$this->documentId->fieldName;
$this->documentId->label = "Document";
$this->addType($this->documentId);

$this->wordId = new \Nemundo\Model\Type\Id\IdType();
$this->wordId->fieldName = "word";
$this->wordId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->wordId->aliasFieldName = $this->wordId->tableName ."_".$this->wordId->fieldName;
$this->wordId->label = "Word";
$this->addType($this->wordId);

}
public function loadDocument() {
if ($this->document == null) {
$this->document = new \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentExternalType(null, $this->parentFieldName . "_document");
$this->document->fieldName = "document";
$this->document->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->document->aliasFieldName = $this->document->tableName ."_".$this->document->fieldName;
$this->document->label = "Document";
$this->addType($this->document);
}
return $this;
}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordExternalType(null, $this->parentFieldName . "_word");
$this->word->fieldName = "word";
$this->word->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->word->aliasFieldName = $this->word->tableName ."_".$this->word->fieldName;
$this->word->label = "Word";
$this->addType($this->word);
}
return $this;
}
}