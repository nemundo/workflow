<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamGroupMemberAction extends AbstractModelAction {
/**
* @return StreamGroupMemberRow
*/
protected function getRow() {
$reader = new StreamGroupMemberReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}