<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\PrefixAutoNumberType
*/
public $workflowNumber;

protected function loadModel() {
$this->tableName = "workflow_workflow";
$this->aliasTableName = "workflow_workflow";
$this->label = "Workflow";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_workflow";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_workflow_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->workflowNumber = new \Nemundo\Model\Type\Number\PrefixAutoNumberType($this);
$this->workflowNumber->tableName = "workflow_workflow";
$this->workflowNumber->fieldName = "workflow_number";
$this->workflowNumber->aliasFieldName = "workflow_workflow_workflow_number";
$this->workflowNumber->label = "Workflow Number";
$this->workflowNumber->allowNullValue = "";
$this->workflowNumber->visible->form = false;
$this->workflowNumber->startNumber = 1000;
$this->workflowNumber->prefix = "W-";

$this->addDefaultType($this->workflowNumber);
}
}