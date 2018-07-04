<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class WikiPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WikiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiModel();
}
/**
* @return WikiRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WikiRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}