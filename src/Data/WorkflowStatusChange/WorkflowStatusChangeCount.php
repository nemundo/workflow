<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
}