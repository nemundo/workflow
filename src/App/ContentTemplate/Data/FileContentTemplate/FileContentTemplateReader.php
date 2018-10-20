<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
/**
* @return FileContentTemplateRow[]
*/
public function getData() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return FileContentTemplateRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileContentTemplateRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileContentTemplateRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}