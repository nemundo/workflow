<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $number;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $workflowNumber;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $draft;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $closed;

/**
* @var \Nemundo\Model\Type\Number\ItemOrderType
*/
public $itemOrder;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $workflowStatusId;

/**
* @var \Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

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

$this->number = new \Nemundo\Model\Type\Number\NumberType($this);
$this->number->tableName = "workflow_workflow";
$this->number->fieldName = "number";
$this->number->aliasFieldName = "workflow_workflow_number";
$this->number->label = "Number";
$this->number->allowNullValue = "";

$this->workflowNumber = new \Nemundo\Model\Type\Text\TextType($this);
$this->workflowNumber->tableName = "workflow_workflow";
$this->workflowNumber->fieldName = "workflow_number";
$this->workflowNumber->aliasFieldName = "workflow_workflow_workflow_number";
$this->workflowNumber->label = "Workflow Number";
$this->workflowNumber->allowNullValue = "";
$this->workflowNumber->length = 20;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "workflow_workflow";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "workflow_workflow_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = "";
$this->subject->length = 255;

$this->processId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->processId->tableName = "workflow_workflow";
$this->processId->fieldName = "process";
$this->processId->aliasFieldName = "workflow_workflow_process";
$this->processId->label = "Process";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "workflow_workflow";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "workflow_workflow_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->draft = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->draft->tableName = "workflow_workflow";
$this->draft->fieldName = "draft";
$this->draft->aliasFieldName = "workflow_workflow_draft";
$this->draft->label = "Draft";
$this->draft->allowNullValue = "";

$this->closed = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->closed->tableName = "workflow_workflow";
$this->closed->fieldName = "closed";
$this->closed->aliasFieldName = "workflow_workflow_closed";
$this->closed->label = "Closed";
$this->closed->allowNullValue = "";

$this->itemOrder = new \Nemundo\Model\Type\Number\ItemOrderType($this);
$this->itemOrder->tableName = "workflow_workflow";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "workflow_workflow_item_order";
$this->itemOrder->label = "Item Order";
$this->itemOrder->allowNullValue = "";
$this->itemOrder->visible->form = false;

$this->workflowStatusId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->workflowStatusId->tableName = "workflow_workflow";
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->aliasFieldName = "workflow_workflow_workflow_status";
$this->workflowStatusId->label = "Workflow Status";

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "workflow_workflow";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "workflow_workflow_deadline";
$this->deadline->label = "Deadline";
$this->deadline->allowNullValue = "";

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessExternalType($this, "workflow_workflow_process");
$this->process->tableName = "workflow_workflow";
$this->process->fieldName = "process";
$this->process->aliasFieldName = "workflow_workflow_process";
$this->process->label = "Process";
}
}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusExternalType($this, "workflow_workflow_workflow_status");
$this->workflowStatus->tableName = "workflow_workflow";
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->aliasFieldName = "workflow_workflow_workflow_status";
$this->workflowStatus->label = "Workflow Status";
}
}
}