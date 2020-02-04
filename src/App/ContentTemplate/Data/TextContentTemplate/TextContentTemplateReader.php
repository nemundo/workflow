<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
/**
* @return TextContentTemplateRow[]
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
* @return TextContentTemplateRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextContentTemplateRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextContentTemplateRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}