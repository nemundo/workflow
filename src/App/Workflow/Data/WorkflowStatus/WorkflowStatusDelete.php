<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WorkflowStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
}