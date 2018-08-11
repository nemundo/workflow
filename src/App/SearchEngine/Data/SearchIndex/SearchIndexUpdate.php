<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class SearchIndexUpdate extends AbstractModelUpdate {
/**
* @var SearchIndexModel
*/
public $model;

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
public $dataId;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
parent::update();
}
}