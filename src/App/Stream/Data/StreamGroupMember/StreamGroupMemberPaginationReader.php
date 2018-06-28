<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StreamGroupMemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
/**
* @return StreamGroupMemberRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamGroupMemberRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}