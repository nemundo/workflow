<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeTextPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var LargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
/**
* @return LargeTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LargeTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}