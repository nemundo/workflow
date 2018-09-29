<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class Document extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var DocumentModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

public function __construct() {
parent::__construct();
$this->model = new DocumentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$id = parent::save();
return $id;
}
}