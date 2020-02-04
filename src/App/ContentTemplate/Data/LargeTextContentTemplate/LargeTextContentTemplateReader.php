<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextContentTemplateModel();
}
/**
* @return LargeTextContentTemplateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return LargeTextContentTemplateRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LargeTextContentTemplateRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LargeTextContentTemplateRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}