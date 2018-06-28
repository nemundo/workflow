<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var StreamGroup MemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
/**
* @return StreamGroup MemberRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new StreamGroup MemberRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}