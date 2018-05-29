<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
}