<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextListModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextListModel();
}
/**
* @return TextListRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextListRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}