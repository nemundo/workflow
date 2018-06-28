<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamTypeAction extends AbstractModelAction {
/**
* @return StreamTypeRow
*/
protected function getRow() {
$reader = new StreamTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}