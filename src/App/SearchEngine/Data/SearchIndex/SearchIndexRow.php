<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

/**
* @var string
*/
public $wordId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Word\WordRow
*/
public $word;

/**
* @var string
*/
public $resultId;

/**
* @var \Nemundo\Workflow\App\SearchEngine\Data\Result\ResultRow
*/
public $result;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->wordId = $this->getModelValue($model->wordId);
if ($model->word !== null) {
$this->loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model->word);
}
$this->resultId = $this->getModelValue($model->resultId);
if ($model->result !== null) {
$this->loadNemundoWorkflowAppSearchEngineDataResultResultresultRow($model->result);
}
}
private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordRow($this->row, $model);
}
private function loadNemundoWorkflowAppSearchEngineDataResultResultresultRow($model) {
$this->result = new \Nemundo\Workflow\App\SearchEngine\Data\Result\ResultRow($this->row, $model);
}
}