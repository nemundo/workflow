<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $process;

/**
* @var string
*/
public $processClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->process = $this->getModelValue($model->process);
$this->processClass = $this->getModelValue($model->processClass);
}
/**
* @return \Nemundo\Workflow\App\Workflow\Process\AbstractProcess
*/
public function getProcessClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->processClass);
return $object;
}
}