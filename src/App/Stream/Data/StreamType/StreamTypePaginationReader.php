<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
/**
* @return StreamTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}