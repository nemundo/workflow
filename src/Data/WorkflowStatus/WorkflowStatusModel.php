<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
class WorkflowStatusModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $workflowStatusClass;

protected function loadModel() {
$this->tableName = "workflow_workflow_status";
$this->aliasTableName = "workflow_workflow_status";
$this->label = "Workflow Status";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_workflow_status";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_workflow_status_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowStatus = new \Nemundo\Model\Type\Text\TextType($this);
$this->workflowStatus->tableName = "workflow_workflow_status";
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->aliasFieldName = "workflow_workflow_status_workflow_status";
$this->workflowStatus->label = "Workflow Status";
$this->workflowStatus->allowNullValue = "";
$this->workflowStatus->length = 255;

$this->workflowStatusClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->workflowStatusClass->tableName = "workflow_workflow_status";
$this->workflowStatusClass->fieldName = "workflow_status_class";
$this->workflowStatusClass->aliasFieldName = "workflow_workflow_status_workflow_status_class";
$this->workflowStatusClass->label = "Workflow Status Class";
$this->workflowStatusClass->allowNullValue = "";
$this->workflowStatusClass->phpClassName = Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus::class;

}
}