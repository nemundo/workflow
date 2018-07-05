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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
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
$this->loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->timeEffort = $this->getModelValue($model->timeEffort);
$this->userCreatedId = $this->getModelValue($model->userCreatedId);
if ($model->userCreated !== null) {
$this->loadNemundoUserDataUserUseruserCreatedRow($model->userCreated);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
}
private function loadNemundoWorkflowAppIdentificationDataIdentificationTypeIdentificationTypeidentificationTypeRow($model) {
$this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeRow($this->row, $model);
}
private function loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserCreatedRow($model) {
$this->userCreated = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}