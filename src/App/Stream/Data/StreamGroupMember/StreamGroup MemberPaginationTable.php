<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroup MemberModel();
}
}