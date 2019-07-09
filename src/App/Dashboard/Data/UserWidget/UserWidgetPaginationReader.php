<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
/**
* @return UserWidgetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserWidgetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}