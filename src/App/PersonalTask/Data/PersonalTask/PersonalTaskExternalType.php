<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $responsibleUserId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $responsibleUser;

/**
* @var \Nemundo\Model\Type\Number\DecimalNumberType
*/
public $timeEffort;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\File\MultiRedirectFilenameType
*/
public $file;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PersonalTaskModel::class;
$this->externalTableName = "personal_task_personal_task";
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

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Erledigen bis";
$this->addType($this->deadline);

$this->responsibleUserId = new \Nemundo\Model\Type\Id\IdType();
$this->responsibleUserId->fieldName = "responsible_user";
$this->responsibleUserId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->responsibleUserId->aliasFieldName = $this->responsibleUserId->tableName ."_".$this->responsibleUserId->fieldName;
$this->responsibleUserId->label = "Verantwortlicher Mitarbeiter";
$this->addType($this->responsibleUserId);

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeEffort->aliasFieldName = $this->timeEffort->tableName . "_" . $this->timeEffort->fieldName;
$this->timeEffort->label = "Aufwand";
$this->addType($this->timeEffort);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Erledigt";
$this->addType($this->done);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Beschreibung";
$this->addType($this->description);

$this->file = new \Nemundo\Model\Type\File\MultiRedirectFilenameType();
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName . "_" . $this->file->fieldName;
$this->file->label = "Datei";
$this->addType($this->file);

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
public function loadResponsibleUser() {
if ($this->responsibleUser == null) {
$this->responsibleUser = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_responsible_user");
$this->responsibleUser->fieldName = "responsible_user";
$this->responsibleUser->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->responsibleUser->aliasFieldName = $this->responsibleUser->tableName ."_".$this->responsibleUser->fieldName;
$this->responsibleUser->label = "Verantwortlicher Mitarbeiter";
$this->addType($this->responsibleUser);
}
return $this;
}
}