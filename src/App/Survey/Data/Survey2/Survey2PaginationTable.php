<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2PaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey2Model();
}
}