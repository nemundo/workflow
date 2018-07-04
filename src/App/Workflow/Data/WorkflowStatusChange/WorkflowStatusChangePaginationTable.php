<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusChangeModel();
}
}