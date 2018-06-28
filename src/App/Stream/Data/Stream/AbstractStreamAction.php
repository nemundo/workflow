<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamAction extends AbstractModelAction {
/**
* @return StreamRow
*/
protected function getRow() {
$reader = new StreamReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}