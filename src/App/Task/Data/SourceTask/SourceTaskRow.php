<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $task;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $responsibleUserId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $responsibleUser;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var float
*/
public $timeEffort;

/**
* @var string
*/
public $source;

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
$this->loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->task = $this->getModelValue($model->task);
$this->dataId = $this->getModelValue($model->dataId);
$this->description = $this->getModelValue($model->description);
$this->responsibleUserId = $this->getModelValue($model->responsibleUserId);
if ($model->responsibleUser !== null) {
$this->loadNemundoUserDataUserUserresponsibleUserRow($model->responsibleUser);
}
$value = $this->getModelValue($model->deadline);
if ($value !== "0000-00-00") {
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
$this->timeEffort = $this->getModelValue($model->timeEffort);
$this->source = $this->getModelValue($model->source);
$this->done = $this->getModelValue($model->done);
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoUserDataUserUserresponsibleUserRow($model) {
$this->responsibleUser = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}