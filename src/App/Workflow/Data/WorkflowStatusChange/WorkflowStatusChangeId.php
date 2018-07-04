<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\Id\AbstractModelIdValue;
class WorkflowStatusChangeId extends AbstractModelIdValue {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
}