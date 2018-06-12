<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var SearchIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
/**
* @return SearchIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SearchIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}