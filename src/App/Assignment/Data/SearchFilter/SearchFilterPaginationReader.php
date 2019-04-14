<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
/**
* @return SearchFilterRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SearchFilterRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}