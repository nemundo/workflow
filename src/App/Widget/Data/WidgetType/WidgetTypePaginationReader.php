<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
/**
* @return WidgetTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WidgetTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}