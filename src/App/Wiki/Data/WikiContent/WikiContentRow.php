<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WikiContentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $pageId;

/**
* @var \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageRow
*/
public $page;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->pageId = $this->getModelValue($model->pageId);
if ($model->page !== null) {
$this->loadNemundoWorkflowAppWikiDataWikiPageWikiPagepageRow($model->page);
}
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->delete = $this->getModelValue($model->delete);
$this->itemOrder = $this->getModelValue($model->itemOrder);
}
private function loadNemundoWorkflowAppWikiDataWikiPageWikiPagepageRow($model) {
$this->page = new \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageRow($this->row, $model);
}
private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
}