<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $workflowStatus;

/**
* @var string
*/
public $dataId;

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

/**
* @var \Nemundo\Workflow\App\Identification\Model\Identification
*/
public $assignment;

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
$this->loadNemundoAppContentDataContentTypeContentTypeworkflowStatusRow($model->workflowStatus);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->itemOrder = $this->getModelValue($model->itemOrder);
$this->draft = $this->getModelValue($model->draft);
$this->message = $this->getModelValue($model->message);
$property = new \Nemundo\Workflow\App\Identification\Model\IdentificationReaderProperty($row, $model->assignment);
$this->assignment = $property->getValue();
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoAppContentDataContentTypeContentTypeworkflowStatusRow($model) {
$this->workflowStatus = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}