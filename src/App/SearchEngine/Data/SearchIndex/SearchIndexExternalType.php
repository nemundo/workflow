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
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

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

$this->processId = new \Nemundo\Model\Type\Id\IdType();
$this->processId->fieldName = "process";
$this->processId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->processId->aliasFieldName = $this->processId->tableName ."_".$this->processId->fieldName;
$this->processId->label = "Process";
$this->addType($this->processId);

$this->workflowId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowId->fieldName = "workflow";
$this->workflowId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowId->aliasFieldName = $this->workflowId->tableName ."_".$this->workflowId->fieldName;
$this->workflowId->label = "Workflow";
$this->addType($this->workflowId);

$this->wordId = new \Nemundo\Model\Type\Id\IdType();
$this->wordId->fieldName = "word";
$this->wordId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->wordId->aliasFieldName = $this->wordId->tableName ."_".$this->wordId->fieldName;
$this->wordId->label = "Word";
$this->addType($this->wordId);

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessExternalType(null, $this->parentFieldName . "_process");
$this->process->fieldName = "process";
$this->process->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->process->aliasFieldName = $this->process->tableName ."_".$this->process->fieldName;
$this->process->label = "Process";
$this->addType($this->process);
}
return $this;
}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_workflow");
$this->workflow->fieldName = "workflow";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "Workflow";
$this->addType($this->workflow);
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