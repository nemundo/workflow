<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WikiContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentTypeModel();
}
/**
* @return WikiContentTypeRow[]
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
* @return WikiContentTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WikiContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WikiContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}