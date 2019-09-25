<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WikiContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
/**
* @return WikiContentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WikiContentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}