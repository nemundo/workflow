<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "repeatingtask_repeating_task";
$this->aliasTableName = "repeatingtask_repeating_task";
$this->label = "Repeating Task";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "repeatingtask_repeating_task";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "repeatingtask_repeating_task_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "repeatingtask_repeating_task";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "repeatingtask_repeating_task_active";
$this->active->label = "Active";
$this->active->allowNullValue = "";

$this->task = new \Nemundo\Model\Type\Text\TextType($this);
$this->task->tableName = "repeatingtask_repeating_task";
$this->task->fieldName = "task";
$this->task->aliasFieldName = "repeatingtask_repeating_task_task";
$this->task->label = "Task";
$this->task->validation = true;
$this->task->allowNullValue = "";
$this->task->length = 255;

$this->deadlineDay = new \Nemundo\Model\Type\Number\NumberType($this);
$this->deadlineDay->tableName = "repeatingtask_repeating_task";
$this->deadlineDay->fieldName = "deadline_day";
$this->deadlineDay->aliasFieldName = "repeatingtask_repeating_task_deadline_day";
$this->deadlineDay->label = "Deadline Day";
$this->deadlineDay->validation = true;
$this->deadlineDay->allowNullValue = "";

}
}