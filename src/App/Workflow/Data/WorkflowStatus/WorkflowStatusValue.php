<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WorkflowStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
}