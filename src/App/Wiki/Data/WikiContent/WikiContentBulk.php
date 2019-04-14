<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WikiContentModel
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

/**
* @var bool
*/
public $delete;

/**
* @var bool
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}