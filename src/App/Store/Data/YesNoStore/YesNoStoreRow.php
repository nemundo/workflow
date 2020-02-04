<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var YesNoStoreModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $value;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->value = boolval($this->getModelValue($model->value));
}
}