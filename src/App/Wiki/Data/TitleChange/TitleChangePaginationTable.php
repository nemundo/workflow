<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TitleChangeModel();
}
}