<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
* @var \Nemundo\Workflow\Data\Workflow\WorkflowRow
*/
public $workflow;

/**
* @var string
*/
public $task;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $responsibleUserId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $responsibleUser;

/**
* @var float
*/
public $timeEffort;

/**
* @var bool
*/
public $done;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->task = $this->getModelValue($model->task);
$value = $this->getModelValue($model->deadline);
if ($value !== "0000-00-00") {
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
$this->responsibleUserId = $this->getModelValue($model->responsibleUserId);
if ($model->responsibleUser !== null) {
$this->loadNemundoUserDataUserUserresponsibleUserRow($model->responsibleUser);
}
$this->timeEffort = $this->getModelValue($model->timeEffort);
$this->done = $this->getModelValue($model->done);
}
private function loadNemundoWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoUserDataUserUserresponsibleUserRow($model) {
$this->responsibleUser = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}