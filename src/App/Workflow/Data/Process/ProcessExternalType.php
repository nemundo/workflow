<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $process;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $processClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ProcessModel::class;
$this->externalTableName = "workflow_process";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->process = new \Nemundo\Model\Type\Text\TextType();
$this->process->fieldName = "process";
$this->process->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->process->aliasFieldName = $this->process->tableName . "_" . $this->process->fieldName;
$this->process->label = "Process";
$this->addType($this->process);

$this->processClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->processClass->fieldName = "process_class";
$this->processClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->processClass->aliasFieldName = $this->processClass->tableName . "_" . $this->processClass->fieldName;
$this->processClass->label = "Process Class";
$this->addType($this->processClass);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

}
}