<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WorkflowStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
}