<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WorkflowAbortTable extends BootstrapModelTable {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowAbortModel();
}
}