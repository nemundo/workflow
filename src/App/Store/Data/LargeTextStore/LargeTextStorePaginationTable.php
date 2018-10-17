<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStorePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextStoreModel();
}
}