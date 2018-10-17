<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractInboxAction extends AbstractModelAction {
/**
* @return InboxRow
*/
protected function getRow() {
$reader = new InboxReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}