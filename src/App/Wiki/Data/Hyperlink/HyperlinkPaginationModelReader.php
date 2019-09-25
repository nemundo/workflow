<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var HyperlinkModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new HyperlinkModel();
}
/**
* @return HyperlinkRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new HyperlinkRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}