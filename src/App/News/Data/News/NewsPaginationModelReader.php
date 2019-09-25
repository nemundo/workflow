<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var NewsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsModel();
}
/**
* @return NewsRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NewsRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}