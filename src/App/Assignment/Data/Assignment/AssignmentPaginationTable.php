<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new AssignmentModel();
}
}