<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SourceTaskModel();
}
}