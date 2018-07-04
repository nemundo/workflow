<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
use Nemundo\Model\Id\AbstractModelIdValue;
class WorkflowStatusId extends AbstractModelIdValue {
/**
* @var WorkflowStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusModel();
}
}