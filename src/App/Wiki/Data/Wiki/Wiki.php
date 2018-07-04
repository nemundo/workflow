<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class Wiki extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WikiModel
*/
protected $model;

/**
* @var string
*/
public $pageId;

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
$this->model = new WikiModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$id = parent::save();
return $id;
}
}