<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupMemberModel();
}
}