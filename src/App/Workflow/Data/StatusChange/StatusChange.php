<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChange extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StatusChangeModel
*/
protected $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var string
*/
public $dataId;

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

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
$this->assignment = new \Nemundo\Workflow\App\Identification\Model\Identification();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->draft, $this->draft);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$property = new \Nemundo\Workflow\App\Identification\Model\IdentificationDataProperty($this->model->assignment, $this->typeValueList);
$property->setValue($this->assignment);
$id = parent::save();
return $id;
}
}