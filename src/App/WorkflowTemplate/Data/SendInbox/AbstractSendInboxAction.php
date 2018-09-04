<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSendInboxAction extends AbstractModelAction {
/**
* @return SendInboxRow
*/
protected function getRow() {
$reader = new SendInboxReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}