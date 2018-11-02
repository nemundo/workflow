<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentModel();
}
}