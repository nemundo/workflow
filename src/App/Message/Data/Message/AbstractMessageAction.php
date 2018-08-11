<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractMessageAction extends AbstractModelAction {
/**
* @return MessageRow
*/
protected function getRow() {
$reader = new MessageReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}