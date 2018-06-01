<?php
namespace Nemundo\Workflow\Data\Process;
class ProcessModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "workflow_process";
$this->aliasTableName = "workflow_process";
$this->label = "Process";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_process";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_process_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->process = new \Nemundo\Model\Type\Text\TextType($this);
$this->process->tableName = "workflow_process";
$this->process->fieldName = "process";
$this->process->aliasFieldName = "workflow_process_process";
$this->process->label = "Process";
$this->process->allowNullValue = "";
$this->process->length = 255;

$this->processClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->processClass->tableName = "workflow_process";
$this->processClass->fieldName = "process_class";
$this->processClass->aliasFieldName = "workflow_process_process_class";
$this->processClass->label = "Process Class";
$this->processClass->allowNullValue = "";
$this->processClass->phpClassName = Nemundo\Workflow\Process\AbstractProcess::class;

$this->addDefaultType($this->process);
$this->addDefaultOrderType($this->process);
}
}