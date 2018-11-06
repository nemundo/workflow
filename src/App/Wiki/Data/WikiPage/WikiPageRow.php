<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WikiPageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $title;

/**
* @var int
*/
public $count;

/**
* @var string
*/
public $url;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->title = $this->getModelValue($model->title);
$this->count = $this->getModelValue($model->count);
$this->url = $this->getModelValue($model->url);
}
}