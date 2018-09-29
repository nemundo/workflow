<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WorkflowAbortModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
}