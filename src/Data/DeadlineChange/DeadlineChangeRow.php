<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
class DeadlineChangeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
}