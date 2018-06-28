<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamGroupAction extends AbstractModelAction {
/**
* @return StreamGroupRow
*/
protected function getRow() {
$reader = new StreamGroupReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}