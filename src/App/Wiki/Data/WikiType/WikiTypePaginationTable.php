<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiTypeModel();
}
}