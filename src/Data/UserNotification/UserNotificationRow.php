<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $statusChangeId;

/**
* @var \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeRow
*/
public $statusChange;

/**
* @var bool
*/
public $read;

/**
* @var bool
*/
public $delete;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->statusChangeId = $this->getModelValue($model->statusChangeId);
if ($model->statusChange !== null) {
$this->loadNemundoWorkflowDataWorkflowStatusChangeWorkflowStatusChangestatusChangeRow($model->statusChange);
}
$this->read = $this->getModelValue($model->read);
$this->delete = $this->getModelValue($model->delete);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowDataWorkflowStatusChangeWorkflowStatusChangestatusChangeRow($model) {
$this->statusChange = new \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeRow($this->row, $model);
}
}