<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubjectChangeModel();
}
}