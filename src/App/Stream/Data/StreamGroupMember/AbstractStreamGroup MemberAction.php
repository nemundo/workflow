<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamGroup MemberAction extends AbstractModelAction {
/**
* @return StreamGroup MemberRow
*/
protected function getRow() {
$reader = new StreamGroup MemberReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}