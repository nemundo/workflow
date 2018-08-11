<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UmfrageStartModel();
}
}