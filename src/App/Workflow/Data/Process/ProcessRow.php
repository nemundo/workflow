<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ProcessModel
*/
public $model;

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

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->process = $this->getModelValue($model->process);
$this->processClass = $this->getModelValue($model->processClass);
$this->setupStatus = $this->getModelValue($model->setupStatus);
}
/**
* @return \Nemundo\App\Content\Type\Process
*/
public function getProcessClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->processClass);
return $object;
}
}