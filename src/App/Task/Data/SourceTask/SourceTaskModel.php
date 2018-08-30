<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskModel extends \Nemundo\Workflow\Model\AbstractWorkflowBaseModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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

protected function loadModel() {
$this->tableName = "task_source_task";
$this->aliasTableName = "task_source_task";
$this->label = "Source Task";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "task_source_task";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "task_source_task_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;


$this->task = new \Nemundo\Model\Type\Text\TextType($this);
$this->task->tableName = "task_source_task";
$this->task->fieldName = "task";
$this->task->aliasFieldName = "task_source_task_task";
$this->task->label = "Aufgabe";
$this->task->validation = true;
$this->task->allowNullValue = "";
$this->task->length = 255;

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "task_source_task";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "task_source_task_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "task_source_task";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "task_source_task_description";
$this->description->label = "Beschreibung";
$this->description->allowNullValue = "";

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "task_source_task";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "task_source_task_deadline";
$this->deadline->label = "Erledigen bis";
$this->deadline->allowNullValue = "";

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->timeEffort->tableName = "task_source_task";
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->aliasFieldName = "task_source_task_time_effort";
$this->timeEffort->label = "Aufwand";
$this->timeEffort->allowNullValue = "";

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "task_source_task";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "task_source_task_source";
$this->source->label = "Source";
$this->source->allowNullValue = "";
$this->source->visible->form = false;
$this->source->length = 255;

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "task_source_task";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "task_source_task_done";
$this->done->label = "Erledigt";
$this->done->allowNullValue = "";
$this->done->visible->form = false;

$this->assignment = new \Nemundo\Workflow\App\Identification\Model\IdentificationModelType($this);
$this->assignment->tableName = "task_source_task";
$this->assignment->fieldName = "assignment";
$this->assignment->aliasFieldName = "task_source_task_assignment";
$this->assignment->label = "Assignment";
$this->assignment->allowNullValue = "";

$this->action->addInsertAction(new \Nemundo\Workflow\App\Task\Action\SourceTaskAction());
}
}