<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\Id\AbstractModelIdValue;
class WorkflowAbortId extends AbstractModelIdValue {
/**
* @var WorkflowAbortModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowAbortModel();
}
}