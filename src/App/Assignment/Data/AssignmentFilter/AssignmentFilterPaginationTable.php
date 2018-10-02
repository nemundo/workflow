<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new AssignmentFilterModel();
}
}