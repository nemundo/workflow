<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
/**
* @return UserConfigRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserConfigRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}