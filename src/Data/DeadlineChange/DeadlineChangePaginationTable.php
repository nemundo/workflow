<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
class DeadlineChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DeadlineChangeModel();
}
}