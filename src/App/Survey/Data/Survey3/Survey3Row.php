<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Row extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $artikel;

/**
* @var string
*/
public $artikelnr;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dataId = $this->getModelValue($model->dataId);
$this->artikel = $this->getModelValue($model->artikel);
$this->artikelnr = $this->getModelValue($model->artikelnr);
}
}