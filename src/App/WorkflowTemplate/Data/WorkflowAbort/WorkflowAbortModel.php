<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $reason;

protected function loadModel() {
$this->tableName = "workflow_template_workflow_abort";
$this->aliasTableName = "workflow_template_workflow_abort";
$this->label = "Workflow Abort";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_workflow_abort";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_workflow_abort_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->reason = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->reason->tableName = "workflow_template_workflow_abort";
$this->reason->fieldName = "reason";
$this->reason->aliasFieldName = "workflow_template_workflow_abort_reason";
$this->reason->label = "Begründung";
$this->reason->validation = true;
$this->reason->allowNullValue = "";

}
}