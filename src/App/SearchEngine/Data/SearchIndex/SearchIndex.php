<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SearchIndexModel
*/
protected $model;

/**
* @var string
*/
public $processId;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $wordId;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$id = parent::save();
return $id;
}
}