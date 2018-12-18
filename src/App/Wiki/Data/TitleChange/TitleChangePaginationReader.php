<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var TitleChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
/**
* @return TitleChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TitleChangeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}