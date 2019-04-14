<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AssignmentModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $message;

/**
* @var \Nemundo\Workflow\App\Identification\Model\Identification
*/
public $assignment;

/**
* @var string
*/
public $assignmentText;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $dataId;

/**
* @var bool
*/
public $archive;

/**
* @var string
*/
public $source;

public function __construct() {
parent::__construct();
$this->model = new AssignmentModel();
$this->assignment = new \Nemundo\Workflow\App\Identification\Model\Identification();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$property = new \Nemundo\Workflow\App\Identification\Model\IdentificationDataProperty($this->model->assignment, $this->typeValueList);
$property->setValue($this->assignment);
$this->typeValueList->setModelValue($this->model->assignmentText, $this->assignmentText);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->archive, $this->archive);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$id = parent::save();
return $id;
}
}