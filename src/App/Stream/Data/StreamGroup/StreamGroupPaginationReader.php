<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StreamGroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
/**
* @return StreamGroupRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamGroupRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}