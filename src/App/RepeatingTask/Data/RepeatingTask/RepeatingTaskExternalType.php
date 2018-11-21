<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $deadlineDay;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RepeatingTaskModel::class;
$this->externalTableName = "repeatingtask_repeating_task";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->task = new \Nemundo\Model\Type\Text\TextType();
$this->task->fieldName = "task";
$this->task->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->task->aliasFieldName = $this->task->tableName . "_" . $this->task->fieldName;
$this->task->label = "Task";
$this->addType($this->task);

$this->deadlineDay = new \Nemundo\Model\Type\Number\NumberType();
$this->deadlineDay->fieldName = "deadline_day";
$this->deadlineDay->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadlineDay->aliasFieldName = $this->deadlineDay->tableName . "_" . $this->deadlineDay->fieldName;
$this->deadlineDay->label = "Deadline Day";
$this->addType($this->deadlineDay);

}
}