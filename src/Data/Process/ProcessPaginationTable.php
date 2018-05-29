<?php
namespace Nemundo\Workflow\Data\Process;
class ProcessPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ProcessModel();
}
}