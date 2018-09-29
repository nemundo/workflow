<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PersonalTaskModel();
}
}