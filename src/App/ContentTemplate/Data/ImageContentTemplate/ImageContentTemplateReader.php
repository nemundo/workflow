<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ImageContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
/**
* @return ImageContentTemplateRow[]
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
* @return ImageContentTemplateRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ImageContentTemplateRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ImageContentTemplateRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}