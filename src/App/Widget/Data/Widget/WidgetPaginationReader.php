<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
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