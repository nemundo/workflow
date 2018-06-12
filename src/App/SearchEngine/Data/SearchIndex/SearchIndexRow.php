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
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessRow
*/
public $process;

/**
* @var string
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\Data\Workflow\WorkflowRow
*/
public $workflow;

/**
* @var string
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
$this->processId = $this->getModelValue($model->processId);
if ($model->process !== null) {
$this->loadNemundoWorkflowDataProcessProcessprocessRow($model->process);
}
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->wordId = $this->getModelValue($model->wordId);
if ($model->word !== null) {
$this->loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model->word);
}
}
private function loadNemundoWorkflowDataProcessProcessprocessRow($model) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessRow($this->row, $model);
}
private function loadNemundoWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoWorkflowAppSearchEngineDataWordWordwordRow($model) {
$this->word = new \Nemundo\Workflow\App\SearchEngine\Data\Word\WordRow($this->row, $model);
}
}