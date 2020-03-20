<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SearchIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $documentId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentRow
*/
public $document;

/**
* @var int
*/
public $wordId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Word\WordRow
*/
public $word;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->documentId = intval($this->getModelValue($model->documentId));
if ($model->document !== null) {
$this->loadNemundoWorkflowAppSearchEngineDataDocumentDocumentdocumentRow($model->document);
}
$this->wordId = intval($this->getModelValue($model->wordId));
if ($model->word !== null) {
$this->loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model->word);
}
}
private function loadNemundoWorkflowAppSearchEngineDataDocumentDocumentdocumentRow($model) {
$this->document = new \Nemundo\Workflow\App\SearchEngine\Data\Document\DocumentRow($this->row, $model);
}
private function loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordRow($this->row, $model);
}
}