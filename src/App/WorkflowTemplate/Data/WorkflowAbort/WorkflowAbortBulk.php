<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WorkflowAbortModel
*/
protected $model;

/**
* @var string
*/
public $reason;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->reason, $this->reason);
$id = parent::save();
return $id;
}
}