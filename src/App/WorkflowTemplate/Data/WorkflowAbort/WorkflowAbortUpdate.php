<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowAbortUpdate extends AbstractModelUpdate {
/**
* @var WorkflowAbortModel
*/
public $model;

/**
* @var string
*/
public $reason;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->reason, $this->reason);
parent::update();
}
}