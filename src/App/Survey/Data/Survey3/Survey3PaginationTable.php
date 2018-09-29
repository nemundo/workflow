<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3PaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey3Model();
}
}