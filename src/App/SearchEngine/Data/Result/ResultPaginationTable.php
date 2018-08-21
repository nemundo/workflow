<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ResultModel();
}
}