<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $workflowId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow
*/
public $workflow;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var \Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusRow
*/
public $workflowStatus;

/**
* @var string
*/
public $workflowItemId;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $itemOrder;

/**
* @var bool
*/
public $draft;

/**
* @var string
*/
public $message;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->workflowStatusId = $this->getModelValue($model->workflowStatusId);
if ($model->workflowStatus !== null) {
$this->loadNemundoWorkflowAppWorkflowDataWorkflowStatusWorkflowStatusworkflowStatusRow($model->workflowStatus);
}
$this->workflowItemId = $this->getModelValue($model->workflowItemId);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->itemOrder = $this->getModelValue($model->itemOrder);
$this->draft = $this->getModelValue($model->draft);
$this->message = $this->getModelValue($model->message);
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowStatusWorkflowStatusworkflowStatusRow($model) {
$this->workflowStatus = new \Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}