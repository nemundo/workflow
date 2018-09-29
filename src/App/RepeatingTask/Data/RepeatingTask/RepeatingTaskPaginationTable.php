<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new RepeatingTaskModel();
}
}