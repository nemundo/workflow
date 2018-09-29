<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

protected function loadModel() {
$this->tableName = "workflow_template_deadline_change";
$this->aliasTableName = "workflow_template_deadline_change";
$this->label = "Deadline Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_deadline_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_deadline_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "workflow_template_deadline_change";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "workflow_template_deadline_change_deadline";
$this->deadline->label = "Datum";
$this->deadline->validation = true;
$this->deadline->allowNullValue = "";

}
}