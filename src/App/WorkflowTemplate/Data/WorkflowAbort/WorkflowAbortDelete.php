<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WorkflowAbortModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
}