<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1PaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey1Model();
}
}