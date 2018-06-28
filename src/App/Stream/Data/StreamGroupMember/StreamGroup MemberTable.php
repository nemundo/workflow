<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamGroup MemberTable extends BootstrapModelTable {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroup MemberModel();
}
}