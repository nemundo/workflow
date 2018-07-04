<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class WikiPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiModel();
}
}