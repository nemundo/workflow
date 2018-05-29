<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
}