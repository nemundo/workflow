<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StatusChangeModel();
}
}