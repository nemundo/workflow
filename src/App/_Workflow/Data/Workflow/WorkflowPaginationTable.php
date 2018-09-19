<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowModel();
}
}