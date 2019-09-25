<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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