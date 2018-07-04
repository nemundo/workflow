<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Model\Data\AbstractModelUpdate;
class WikiUpdate extends AbstractModelUpdate {
/**
* @var WikiModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
parent::update();
}
}