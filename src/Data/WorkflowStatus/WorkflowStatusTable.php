<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WorkflowStatusTable extends BootstrapModelTable {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusModel();
}
}