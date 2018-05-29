<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
class WorkflowStatusPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusModel();
}
}