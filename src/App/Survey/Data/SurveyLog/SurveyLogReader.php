<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
/**
* @return SurveyLogRow[]
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
* @return SurveyLogRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SurveyLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SurveyLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}