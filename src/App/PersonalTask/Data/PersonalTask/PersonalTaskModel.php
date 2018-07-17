<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskModel extends \Nemundo\Workflow\Model\AbstractWorkflowBaseModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "personal_task_personal_task";
$this->aliasTableName = "personal_task_personal_task";
$this->label = "Personal Task";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "personal_task_personal_task";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "personal_task_personal_task_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;


$this->task = new \Nemundo\Model\Type\Text\TextType($this);
$this->task->tableName = "personal_task_personal_task";
$this->task->fieldName = "task";
$this->task->aliasFieldName = "personal_task_personal_task_task";
$this->task->label = "Aufgabe";
$this->task->validation = true;
$this->task->allowNullValue = "";
$this->task->length = 255;

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "personal_task_personal_task";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "personal_task_personal_task_deadline";
$this->deadline->label = "Erledigen bis";
$this->deadline->validation = true;
$this->deadline->allowNullValue = "";

$this->responsibleUserId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->responsibleUserId->tableName = "personal_task_personal_task";
$this->responsibleUserId->fieldName = "responsible_user";
$this->responsibleUserId->aliasFieldName = "personal_task_personal_task_responsible_user";
$this->responsibleUserId->label = "Verantwortlicher Mitarbeiter";
$this->loadResponsibleUser();

$this->timeEffort = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->timeEffort->tableName = "personal_task_personal_task";
$this->timeEffort->fieldName = "time_effort";
$this->timeEffort->aliasFieldName = "personal_task_personal_task_time_effort";
$this->timeEffort->label = "Aufwand";
$this->timeEffort->allowNullValue = "";

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "personal_task_personal_task";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "personal_task_personal_task_done";
$this->done->label = "Erledigt";
$this->done->allowNullValue = "";
$this->done->visible->form = false;

}
public function loadResponsibleUser() {
if ($this->responsibleUser == null) {
$this->responsibleUser = new \Nemundo\User\Data\User\UserExternalType($this, "personal_task_personal_task_responsible_user");
$this->responsibleUser->tableName = "personal_task_personal_task";
$this->responsibleUser->fieldName = "responsible_user";
$this->responsibleUser->aliasFieldName = "personal_task_personal_task_responsible_user";
$this->responsibleUser->label = "Verantwortlicher Mitarbeiter";
$this->responsibleUser->validation = true;
}
}
}