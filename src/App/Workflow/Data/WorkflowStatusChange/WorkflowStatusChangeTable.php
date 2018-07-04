<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WorkflowStatusChangeTable extends BootstrapModelTable {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusChangeModel();
}
}