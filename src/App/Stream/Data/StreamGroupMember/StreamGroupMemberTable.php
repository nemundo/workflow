<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamGroupMemberTable extends BootstrapModelTable {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroupMemberModel();
}
}