<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
/**
* @return TeamUserRow[]
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
* @return TeamUserRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TeamUserRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TeamUserRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}