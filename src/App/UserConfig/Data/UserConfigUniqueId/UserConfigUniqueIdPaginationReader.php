<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
/**
* @return UserConfigUniqueIdRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserConfigUniqueIdRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}