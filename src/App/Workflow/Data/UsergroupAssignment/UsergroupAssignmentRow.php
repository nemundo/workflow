<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupRow
*/
public $usergroup;

/**
* @var bool
*/
public $delete;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->usergroupId = $this->getModelValue($model->usergroupId);
if ($model->usergroup !== null) {
$this->loadNemundoUserDataUsergroupUsergroupusergroupRow($model->usergroup);
}
$this->delete = $this->getModelValue($model->delete);
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoUserDataUsergroupUsergroupusergroupRow($model) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupRow($this->row, $model);
}
}