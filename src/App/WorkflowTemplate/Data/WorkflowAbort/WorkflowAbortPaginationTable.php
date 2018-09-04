<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowAbortModel();
}
}