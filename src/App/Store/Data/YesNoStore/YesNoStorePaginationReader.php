<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStorePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
/**
* @return YesNoStoreRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new YesNoStoreRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}