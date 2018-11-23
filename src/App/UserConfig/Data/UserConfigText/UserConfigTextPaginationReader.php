<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UserConfigTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigTextModel();
}
/**
* @return UserConfigTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserConfigTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}