<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WorkflowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
}