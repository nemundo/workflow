<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Model\Reader\Property\Number\PrefixAutoNumberReaderProperty
*/
public $workflowNumber;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowNumber = new \Nemundo\Model\Reader\Property\Number\PrefixAutoNumberReaderProperty($row, $model->workflowNumber);
}
}