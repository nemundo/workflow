<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
class TaskRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var bool
*/
public $archive;

/**
* @var string
*/
public $identificationTypeId;

/**
* @var \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeRow
*/
public $identificationType;

/**
* @var string
*/
public $identificationId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

/**
* @var string
*/
public $dataId;

/**
* @var float
*/
public $timeEffort;

/**
* @var string
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userCreated;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var string
*/
public $sourceId;

/**
* @var string
*/
public $source;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->task = $this->getModelValue($model->task);
$value = $this->getModelValue($model->deadline);
if ($value !== "0000-00-00") {
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
$this->archive = $this->getModelValue($model->archive);
$this->identificationTypeId = $this->getModelValue($model->identificationTypeId);
if ($model->identificationType !== null) {
$this->loadNemundoWorkflowAppIdentificationDataIdentificationTypeIdentificationTypeidentificationTypeRow($model->identificationType);
}
$this->identificationId = $this->getModelValue($model->identificationId);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->timeEffort = $this->getModelValue($model->timeEffort);
$this->userCreatedId = $this->getModelValue($model->userCreatedId);
if ($model->userCreated !== null) {
$this->loadNemundoUserDataUserUseruserCreatedRow($model->userCreated);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->sourceId = $this->getModelValue($model->sourceId);
$this->source = $this->getModelValue($model->source);
}
private function loadNemundoWorkflowAppWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoWorkflowAppIdentificationDataIdentificationTypeIdentificationTypeidentificationTypeRow($model) {
$this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeRow($this->row, $model);
}
private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserCreatedRow($model) {
$this->userCreated = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}