<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
class WidgetPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetModel();
}
/**
* @return WidgetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WidgetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}