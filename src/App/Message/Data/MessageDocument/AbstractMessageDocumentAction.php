<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractMessageDocumentAction extends AbstractModelAction {
/**
* @return MessageDocumentRow
*/
protected function getRow() {
$reader = new MessageDocumentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}