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
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

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

$this->processId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->processId->tableName = "searchengine_search_index";
$this->processId->fieldName = "process";
$this->processId->aliasFieldName = "searchengine_search_index_process";
$this->processId->label = "Process";

$this->workflowId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowId->tableName = "searchengine_search_index";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "searchengine_search_index_workflow";
$this->workflowId->label = "Workflow";
$this->loadWorkflow();

$this->wordId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->wordId->tableName = "searchengine_search_index";
$this->wordId->fieldName = "word";
$this->wordId->aliasFieldName = "searchengine_search_index_word";
$this->wordId->label = "Word";

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->workflowId);
$index->addType($this->wordId);

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessExternalType($this, "searchengine_search_index_process");
$this->process->tableName = "searchengine_search_index";
$this->process->fieldName = "process";
$this->process->aliasFieldName = "searchengine_search_index_process";
$this->process->label = "Process";
}
}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType($this, "searchengine_search_index_workflow");
$this->workflow->tableName = "searchengine_search_index";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "searchengine_search_index_workflow";
$this->workflow->label = "Workflow";
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