<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SearchIndexModel();
}
}