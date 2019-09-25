<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserConfigNumberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
/**
* @return UserConfigNumberRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserConfigNumberRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}