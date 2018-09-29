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
public $contentTypeId;

/**
* @var string
*/
public $wordId;

/**
* @var string
*/
public $resultId;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$this->typeValueList->setModelValue($this->model->resultId, $this->resultId);
$id = parent::save();
return $id;
}
}