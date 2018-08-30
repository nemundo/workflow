<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Number\DecimalNumberType
*/
public $timeEffort;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Workflow\App\Identification\Model\IdentificationModelType
*/
public $assignment;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = SourceTaskModel::class;
$this->externalTableName = "task_source_task";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->workflowId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowId->fieldName = "workflow";
$this->workflowId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowId->aliasFieldName = $this->workflowId->tableName ."_".$this->workflowId->fieldName;
$this->workflowId->label = "";
$this->addType($this->workflowId);

$this->task = new \Nemundo\Model\Type\Text\TextType();
$this->task->fieldName = "task";
$this->task->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->task->aliasFieldName = $this->task->tableName . "_" . $this->task->fieldName;
$this->task->label = "Aufgabe";
$this->addType($this->task);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Beschreibung";
$this->addType($this->description);

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Erledigen bis";
$this->addType($this->deadline);

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeEffort->aliasFieldName = $this->timeEffort->tableName . "_" . $this->timeEffort->fieldName;
$this->timeEffort->label = "Aufwand";
$this->addType($this->timeEffort);

$this->source = new \Nemundo\Model\Type\Text\TextType();
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName . "_" . $this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Erledigt";
$this->addType($this->done);

$this->assignment = new \Nemundo\Workflow\App\Identification\Model\IdentificationModelType();
$this->assignment->fieldName = "assignment";
$this->assignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->assignment->aliasFieldName = $this->assignment->tableName . "_" . $this->assignment->fieldName;
$this->assignment->label = "Assignment";
$this->assignment->createObject();
$this->addType($this->assignment);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_workflow");
$this->workflow->fieldName = "workflow";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "";
$this->addType($this->workflow);
}
return $this;
}
}