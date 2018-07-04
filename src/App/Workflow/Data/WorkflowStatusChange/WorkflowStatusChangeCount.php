<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
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