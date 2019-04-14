<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SearchIndexModel
*/
protected $model;

/**
* @var string
*/
public $documentId;

/**
* @var string
*/
public $wordId;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->documentId, $this->documentId);
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$id = parent::save();
return $id;
}
}